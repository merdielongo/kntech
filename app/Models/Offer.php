<?php

namespace App\Models;

use App\Traits\KnGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory, SoftDeletes, KnGenerator;

    protected $fillable = [
        'user_id',
        'kn_id',
        'name',
        'description',
        'propositions',
        'availability_model_id',
        'availability_model',
        'is_active',
        'is_publish',
        'price',
        'currency_id',
        'is_promotion'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function currency() : BelongsTo {
        return $this->belongsTo(Currency::class);
    }

    public function getPriceFullAttribute() : string {
        return $this->price .' '. $this->currency->symbol;
    }

}
