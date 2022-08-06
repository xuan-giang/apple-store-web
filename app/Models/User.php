<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $hidden = ['password'];
    protected $table ='user';
    protected $primaryKey = 'id';
    protected $fillable = ['username', 'password'];
    use HasFactory;
}
