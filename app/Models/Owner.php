<?php

namespace App\Models;

use App\Traits\KnGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{
    use HasFactory, KnGenerator,SoftDeletes;

    protected $fillable = [
        'user_id',
        'contact_id',
        'kn_id',
        'is_active',
        'authorization',
        'status'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function contact() : BelongsTo {
        return $this->belongsTo(Contact::class);
    }

}
