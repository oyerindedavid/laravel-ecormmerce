<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory ;

    public function scopeFilter($query, array $filters) {
        if($filters['color'] ?? false) {
            $query->where('colors', 'like', '%' . request('color') . '%');
        }

    }

}

