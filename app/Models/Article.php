<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'image', 'published', 'publish_date', 'order', 'author'];
    

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
