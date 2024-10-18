<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes; // Thêm SoftDeletes vào đây
    //tạo các thuộc tính cho đối tượng Product
    protected $fillable = [

        'name',
        'price',
        'status',
    ];
}
