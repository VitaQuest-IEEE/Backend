<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitamin extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function ai_results()
    {
        return $this->belongsToMany(AiResult::class, 'ai_result_vitamin')
            ->withTimestamps();
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_vitamin')
            ->withTimestamps();
    }
}
