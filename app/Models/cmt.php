<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmt extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = [
        'id',
        'cmt',
        'id_blog',
        'id_user',
        'avatar',
        'name',
        'level'
        
     ];
}
