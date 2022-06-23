<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use HasFactory;
    public $table = 'money';
    protected $fillable = [
        'status',
        'category_id',
        'subCategory_id',
        'product_id',
        'price',
        'comment'
    ];
}
