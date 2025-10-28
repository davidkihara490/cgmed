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
        'company_name',
        'company_type',
        'company_address',
        'country',
        'city',
        'postal_code',
        'phone',
        'job_title',
        'terms_agreement',
        'user_type',
        'user_id'
    ];

    public function getNameAttribute(): string
    {
        $first = trim((string) $this->first_name);
        $last = trim((string) $this->last_name);

        if ($first === '' && $last === '') {
            return '';
        }

        if ($first === '') {
            return $last;
        }

        if ($last === '') {
            return $first;
        }

        return $first . ' ' . $last;
    }
}
