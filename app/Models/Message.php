<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'subject', 'text', 'read'];

    public function scopeRead($query, $rd = false)
    {
        return $query->where('read', $rd);
    }
}
