<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /** @use HasFactory<\Database\Factories\PartnerFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'confirm_password',
        'company_name',
        'company_type',
        'company_address',
        'country',
        'city',
        'postal_code',
        'phone',
        'job_title',
        'user_type',
        'terms_agreement',
        'user_type',
        'user_id'
    ];
}
