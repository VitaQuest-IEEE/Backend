<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AiModel extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function ai_results(): HasMany
    {
        return $this->hasMany(AiResult::class);
    }
}
