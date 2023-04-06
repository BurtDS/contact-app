<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    public function people()
    {
        return $this->morphedByMany(Person::class, 'taggable');
    }

    public function businesses()
    {
        return $this->morphedByMany(Business::class, 'taggable');
    }

}
