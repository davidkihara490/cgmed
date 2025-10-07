<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'company_name',

        'logo',

        'hero_image',
        'hero_title',
        'hero_sub_title',

        'about',
        'phone',
        'email',
        'address',

        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
        'pinterest',
        'tiktok',

        'copyright',
    ];
}
