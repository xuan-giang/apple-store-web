<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table ='management_image_banner';
    use HasFactory;

    public function get_url_image():string
    {
        return "img/image-bg/".$this->url;
    }
}
