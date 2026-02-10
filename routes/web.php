<?php

use App\Http\Controllers\admin\adminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\usersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProductFrontController;
use App\Http\Controllers\superAdminController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\GlobalPresenceController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ClothSizeController;
use App\Http\Controllers\admin\ClothColorController;
use App\Http\Controllers\admin\AboutImageController;
use App\Http\Controllers\admin\MenuImageController;
use App\Http\Controllers\admin\{CatalogueImageController, TrustedByController, WhyChooseUsController};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Artisan;

Route::get('clear', function () {
    Artisan::call('optimize:clear');

    return 'Optimization cache cleared!';
});

//Front route
Route::get('/', [dashboardController::class, 'index']);
Route::get('/about-us', [dashboardController::class, 'about'])->name('about');
Route::get('/contact-us', [dashboardController::class, 'contact'])->name('contact');
Route::post('/post-contact-us', [dashboardController::class, 'postContact'])->name('post.contact');
 Route::post('/check-email-unique', [dashboardController::class, 'checkEmailUnique'])->name('check.email.unique');
Route::get('/shipping-policy', [dashboardController::class, 'shippingpolicy'])->name('shippingpolicy');
Route::get('/products/{categoryUrl}', [ProductFrontController::class, 'index'])->name('products');
Route::get('/products-details/{url}/{id?}', [ProductFrontController::class, 'productdetails'])->name('productdetails');
Route::get('/landing', [dashboardController::class, 'landing'])->name('landing');
Route::get('/test-filter', [dashboardController::class, 'filter'])->name('filter');

Route::get('/get-products/{type}/{size_range?}', [dashboardController::class, 'getProducts'])->name('get.products');
Route::get('/get-total-products', [dashboardController::class, 'getTotalProducts'])->name('get.total.products');
Route::get('/get-filter-products', [dashboardController::class, 'getFilterProducts'])->name('get.filter.products');

	
Route::get('login', [dashboardController::class, 'login'])->name('login');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', [usersController::class, 'user'])->name('user');
 Route::get('/admin/dashboard',[dashboardController::class, 'admin'])->name('/admin/dashboard');
 Route::get('/superAdmin', [superAdminController::class, 'superAdmin'])->name('superAdmin');  

 Route::get('/admin/dashboard', [adminController::class, 'admin'])->name('admin/dashboard');

		
	Route::resource('blog', BlogController::class);
    Route::resource('globalpresence', GlobalPresenceController::class);
	Route::resource('category', CategoryController::class);
	Route::resource('product', ProductController::class);
	Route::resource('brand', BrandController::class);
	Route::resource('clothsize', ClothSizeController::class);
	Route::resource('clothcolor', ClothColorController::class);
	Route::resource('aboutimage', AboutImageController::class);
	Route::resource('menuimage', MenuImageController::class);
    Route::resource('catalogue-image', CatalogueImageController::class);
	Route::resource('trusted-by', TrustedByController::class);
	Route::resource('whychoose-us', WhyChooseUsController::class);


 
Route::prefix('backend')->group(function () {
	Route::prefix('')->group(function () {
	
	});

	// UI Components
	Route::prefix('')->group(function () {
		Route::get('ui-alerts', [BackendController::class, 'uiAlerts'])->name('ui-alerts');
		Route::get('ui-badge', [BackendController::class, 'uiBadge'])->name('ui-badge');
		Route::get('ui-breadcrumb', [BackendController::class, 'uiBreadcrumb'])->name('ui-breadcrumb');
		Route::get('ui-buttons', [BackendController::class, 'uiButtons'])->name('ui-buttons');
		Route::get('ui-card', [BackendController::class, 'uiCard'])->name('ui-card');
		Route::get('ui-carousel', [BackendController::class, 'uiCarousel'])->name('ui-carousel');
		Route::get('ui-collapse', [BackendController::class, 'uiCollapse'])->name('ui-collapse');
		Route::get('ui-dropdowns', [BackendController::class, 'uiDropdowns'])->name('ui-dropdowns');
		Route::get('ui-listgroup', [BackendController::class, 'uiListgroup'])->name('ui-listgroup');
		Route::get('ui-modal', [BackendController::class, 'uiModal'])->name('ui-modal');
		Route::get('ui-navs', [BackendController::class, 'uiNavs'])->name('ui-navs');
		Route::get('ui-navbar', [BackendController::class, 'uiNavbar'])->name('ui-navbar');
		Route::get('ui-pagination', [BackendController::class, 'uiPagination'])->name('ui-pagination');
		Route::get('ui-popovers', [BackendController::class, 'uiPopovers'])->name('ui-popovers');
		Route::get('ui-progress', [BackendController::class, 'uiProgress'])->name('ui-progress');
		Route::get('ui-scrollspy', [BackendController::class, 'uiScrollspy'])->name('ui-scrollspy');
		Route::get('ui-spinners', [BackendController::class, 'uiSpinners'])->name('ui-spinners');
		Route::get('ui-toasts', [BackendController::class, 'uiToasts'])->name('ui-toasts');
		Route::get('ui-tooltips', [BackendController::class, 'uiTooltips'])->name('ui-tooltips');
	});

	// Other Pages
	Route::prefix('')->group(function () {
		Route::get('admin-profile', [BackendController::class, 'adminProfile'])->name('admin-profile');

	});

	Route::get('help', [BackendController::class, 'help'])->name('help');


	
});
});