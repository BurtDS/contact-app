<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description'
    ];

    public function taskable()
    {
        return $this->morphTo();
    }

    public function markAsCompleted()
    {
        $this->status = 'completed';
        $this->save();
        return true;
    }

    public function scopeOpen($query)
    {
        $query->where('status', 'open');
    }
}
