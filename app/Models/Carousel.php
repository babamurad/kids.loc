<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'status', 'order'];

    public function scopeStatus($query)
    {
        return $query->where('status', true);
    }
}
