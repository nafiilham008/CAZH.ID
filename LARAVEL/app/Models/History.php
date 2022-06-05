<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_company',
        'id_employee',
        'balance',
        'company_start_balance',
        'company_last_balance',
        'employees_start_balance',
        'employees_last_balance'

    ];
}
