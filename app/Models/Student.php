<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class Student extends Model
{
    use HasFactory;
    protected $table ='students';  // kết nói với bảng nào mặc định sẽ tự kết nối với bảng theo tên model (viết lower) +'s'

    protected function getAge(): Attribute
    {
        return Attribute::make(
            get : function($value , $attributes){
                $date = new DateTime($attributes['birthdate']);
                $now = new DateTime();
                return $now->diff($date)->y;
            },
        );
    }


}
