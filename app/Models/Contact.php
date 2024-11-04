<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'addresses',
        'subject',
        'content',
    ];
}
