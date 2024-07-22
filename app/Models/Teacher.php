<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['firstname', 'lastname', 'order', 'desc', 'image', 'published', 'position'];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
