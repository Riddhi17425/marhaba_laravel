<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'about_images';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
}
