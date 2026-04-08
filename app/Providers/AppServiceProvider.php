<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\{Product, ClothSize};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        
        Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {
            $client = new \GuzzleHttp\Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => env('RECAPTCHA_SECRET_KEY'),
                    'response' => $value,
                    'remoteip' => $_SERVER['REMOTE_ADDR'],
                ],
            ]);

            $body = json_decode((string) $response->getBody());
            return $body->success;
        });


        // FOR ENQUIRY POPUP
        $filterProducts = [];
        $clothsizes = ClothSize::all()->keyBy('id');
        $enquiryPopupAgeSections = config('global_values.inquiry_popup_age_section');
        $data = ['baby' => 0,  'toddler' => 0, 'kids' => 0];
        $productsArr = Product::select('id', 'type', 'brand_id', 'category_id','name','url','image','product_brand_size')->orderBy('created_at', 'desc')->whereNull('deleted_at')->get();
        foreach ($productsArr as $pv) {
            $brandSizes = json_decode($pv->product_brand_size, true);
            if (!is_array($brandSizes)) {
                continue;
            }
            $brandSizes = collect($brandSizes)->groupBy('size_id');
            // Check all sizes in product_brand_size
            foreach ($brandSizes as $bk => $bs) {
                $sizeId = $bk ? (int)$bk : null;
                if (!$sizeId || !isset($clothsizes[$sizeId])) {
                    continue;
                }
                $size = $clothsizes[$sizeId];
                $sizeName = trim($size->name); 
                $range = $this->sizeToMonths($sizeName);
                if (!$range) {
                    continue;
                }
                // Check if size fits into any age section
                foreach ($enquiryPopupAgeSections as $sectionKey => $section) {
                    // If any overlap between size range and section range
                    if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) {
                        if(strtolower($sectionKey) == 'baby'){
                            $data['baby'] += 1;
                        }elseif(strtolower($sectionKey) == 'toddler'){
                            $data['toddler'] += 1;
                        }elseif(strtolower($sectionKey) == 'kids'){
                            $data['kids'] += 1;
                        }
                        // Assign product to this age section if not already assigned
                            $filterProducts['products'][][$sizeName] = $pv;
                        // Optional: break if you want product only in one section
                        break;
                    }
                }
            }
        }
        
        //Sorted by age range
        if (!empty($filterProducts['products'])) {
            usort($filterProducts['products'], function ($itemA, $itemB) {
                $sizeA = array_key_first($itemA);
                $sizeB = array_key_first($itemB);
                $rangeA = $this->sizeToMonths($sizeA);
                $rangeB = $this->sizeToMonths($sizeB);

                return ($rangeA['min'] ?? 0) <=> ($rangeB['min'] ?? 0);
            });
        }

        $productData = [
            'boy' => [
                'baby' => [],
                'toddlers' => [],
                'kids' => []
            ],
            'girl' => [
                'baby' => [],
                'toddlers' => [],
                'kids' => []
            ]
        ];
        foreach ($filterProducts['products'] as $productGroup) {
            foreach ($productGroup as $size => $v) {
                $type = strtolower($v->type);
                $name = $v->name;
                $range = $this->sizeToMonths($size);
                if (!$range) {
                    continue;
                }
                $maxMonths = $range['max'];
                foreach ($enquiryPopupAgeSections as $sectionKey => $section) {
                    if ($maxMonths >= $section['min'] && $maxMonths <= $section['max']) {
                        // $productData[$type][$sectionKey][] = $name. ' ('.$size.')';
                        $productData[$type][$sectionKey][] = $name;
                        break;
                    }
                }
            }
        }
        foreach ($productData as $type => $groups) {
            foreach ($groups as $ageGroup => $products) {
                $productData[$type][$ageGroup] = array_values(array_unique($products));
            }
        }

        //PRODUCT INQUIRY FORM
        $productNames = [];
        // Loop through boys and girls and all age groups
        foreach ($productData as $gender => $groups) {
            foreach ($groups as $ageGroup => $names) {
                foreach ($names as $fullName) {
                    // Remove size info if stored like "Romper (0m-9m)"
                    $name = preg_replace('/\s*\(.*?\)$/', '', $fullName);
                    $productNames[] = $name;
                }
            }
        }
        $productNames = array_unique($productNames);
        $productNamesData = Product::select('id', 'type', 'category_id','name','translations', 'product_brand_size')->whereIn('name', $productNames)->get();
        $languages = config('global_values.languages');
        $productTranslations = [];
        // English initialization
        $productTranslations['en'] = [];
        foreach ($productNames as $name) {
            $productTranslations['en'][$name] = $name;
        }
        // Initialize other languages
        foreach ($languages as $lang) {
            $productTranslations[$lang] = [];
        }
        
        // Fill translations
        foreach ($productNamesData as $v) {
            $translations = json_decode($v->translations, true); // decode DB JSON

            foreach ($languages as $lang) {
                if (isset($translations[$lang][$v->name])) {
                    // assign the actual translated string, not array
                    $productTranslations[$lang][$v->name] = $translations[$lang][$v->name];
                } else {
                    // fallback to English
                    $productTranslations[$lang][$v->name] = $v->name;
                }
            }
        }

        View::composer('*', function ($view) use ($productTranslations, $productData) {
            $menuTypes = config('global_values.product_type');
            $view->with(['menuTypes' => $menuTypes, 'productTranslations' => $productTranslations, 'productData' => $productData]);
        });
    }

    protected function sizeToMonths($size)
    {
        $size = trim($size);

        // Match patterns like 2-5Y, 6-12Y, 0m-9m, 3m-12m, 1-10Y
        if (!preg_match('/^(\d+)(m|Y)?\s*-\s*(\d+)(m|Y)?$/i', $size, $matches)) {
            return null;
        }

        // Extract numbers and units
        $min = (int)$matches[1];
        $minUnit = isset($matches[2]) && $matches[2] ? strtoupper($matches[2]) : 'Y';
        $max = (int)$matches[3];
        $maxUnit = isset($matches[4]) && $matches[4] ? strtoupper($matches[4]) : 'Y';

        // Convert to months
        $minMonths = $minUnit === 'Y' ? $min * 12 : $min;
        $maxMonths = $maxUnit === 'Y' ? $max * 12 : $max;

        return [
            'min' => $minMonths,
            'max' => $maxMonths
        ];
    }

}
