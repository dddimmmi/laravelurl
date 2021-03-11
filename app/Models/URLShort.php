<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class URLShort extends Model
{
    use HasFactory;
    protected $table = 'url_short';
    protected $primaryKey = 'id';

    protected $fillable = [

         'url',
         'short'
    ];
}
