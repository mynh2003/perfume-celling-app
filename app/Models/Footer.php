<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'footer';

    protected $fillable = [
        'copyright',
        'member',
        'class',
        'address',
    ];
    public $timestamps = false;
}
