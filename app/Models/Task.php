<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'is_done'];

    public function scopeCompleted(Builder $query, bool $completed): Builder
    {
        return $query->where('is_done', $completed);
    }

}
