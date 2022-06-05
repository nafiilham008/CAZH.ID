<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'balance',
        'logo',
        'web',
        'slug_url'
    ];
}
