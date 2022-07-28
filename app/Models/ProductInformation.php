<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInformation extends Model
{
    use HasFactory;
    protected $table ='product_information';
    protected $fillable = ['id_product','display',
        'operating_system',
        'front_camera',
        'rear_camera',
        'cpu',
        'ram',
        'rom',
        'battery',
        'security',
        'charging_port',
        'compatible',
        'sound_technology',
        'used_time',
        'connect',
        'weight',
        'brand',
        'made_in',
        'hard_drive',
        'graphic_card',
        ];
    public $timestamps = false;
}
