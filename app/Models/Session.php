<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'model',
        'model_id',
        'full_name',
        'is_active',
        'status',
        'started_at',
        'ending_at'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function organization() : BelongsTo {
        return $this->belongsTo(Organization::class, 'model_id');
    }

}
