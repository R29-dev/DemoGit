<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  rate extends Model
{
    use HasFactory;
    protected $table = 'rates';
    public $timestamps= true;
    protected $fillable = [
       'id',
       'rate',
       'id_blog',
       'id_user'
    ];


}
