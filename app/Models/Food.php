<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function vitamins()
    {
        return $this->belongsToMany(Vitamin::class, 'food_vitamin')
            ->withTimestamps();
    }
}
