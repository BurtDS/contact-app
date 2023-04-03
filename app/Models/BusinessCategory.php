<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    use HasFactory;


    public function business()
    {
        return $this->belongsToMany(Business::class, 'category_has_business');
    }
}
