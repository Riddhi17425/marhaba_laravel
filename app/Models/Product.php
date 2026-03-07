<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ClothSize;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class)->withTrashed();
    }

    public function colors()
    {
        return $this->belongsToMany(ClothColor::class, 'product_brand_size', 'product_id', 'color_id');
    }

    static public function getSizeId($sizeName){
        $getSize = ClothSize::select('id', 'name')->whereRaw('LOWER(name) LIKE ?',['%' . strtolower($sizeName) . '%'])->first();

        return $getSize;
    }
}
