<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubSection extends Model
{
    protected $fillable = [
        'section_id',
        'name',
        'description',
        'status',
    ];


    public function section(){
        return $this->belongsTo(Section::class);
    }
}
