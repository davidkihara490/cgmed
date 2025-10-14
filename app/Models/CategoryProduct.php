<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $fillable  = [
        'name',
        'image',
        'sub_category_id',
        'description',
        'status',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
