<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    protected $table ='product_images';
    protected $fillable = ['id_product','url'];
    public $timestamps = false;
    public function get_url_image_by_image_name():string
    {
        return "img/image-product/".$this->url;
    }
}
