<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {

        if($filters['search'] ?? false)
        {
            $query->where('title', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('description') . '%');
        }
    }

    // Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
