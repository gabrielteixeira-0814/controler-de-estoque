<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tb_user extends Model
{
    protected $fillable = [
        'name',
        'office',
    ];

    //protected $table = 'tb_user';
}
