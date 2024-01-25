<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps= false;
    protected $fillable = [
       'id',
        'id_user',
       'name',
       'price',
       'id_category',
       'id_brand',
       'status',
       'sale',
       'company',
       'hinhanh',
       'detail',
       'created_at',
       'updated_at'

    ];

}
