<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{

    protected $fillable = [
        'name', 'code'
    ];
    protected $table = 'currencies';
}

