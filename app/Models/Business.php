<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Business extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'business_name',
        'contact_email',
    ];


    public function people()
    {
        return $this->hasMany(Person::class);
    }

    public function categories()
    {
        return $this->belongsToMany(BusinessCategory::class, 'category_has_business');
    }

    public function tasks()
    {
        return $this->morphMany(Task::class, 'taskable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


}
