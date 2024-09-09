<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AiResult extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_ai_result')
            ->withTimestamps();
    }

    public function ai_model(): BelongsTo
    {
        return $this->belongsTo(AiModel::class);
    }

    public function vitamins(): BelongsToMany
    {
        return $this->belongsToMany(Vitamin::class, 'ai_result_vitamin')
            ->withTimestamps();
    }
}
