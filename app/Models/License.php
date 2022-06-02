<?php

namespace App\Models;

use App\Traits\KnGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class License extends Model
{
    use HasFactory, SoftDeletes, KnGenerator;

    protected $fillable = [
        'kn_id',
        'user_id',
        'organization_id',
        'offer_id',
        'day',
        'label',
        'expiration_at',
        'beginning_license',
        'end_license',
        'status',
        'is_active',
        'is_expired'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function organization() : BelongsTo {
        return $this->belongsTo(Organization::class);
    }

    public function offer() : BelongsTo {
        return $this->belongsTo(Offer::class);
    }

}
