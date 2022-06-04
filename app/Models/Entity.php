<?php

namespace App\Models;

use App\Traits\KnGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
    use HasFactory, SoftDeletes, KnGenerator;

    protected $fillable = [
        'kn_id',
        'manager_id',
        'user_id',
        'model',
        'model_id',
        'organization_id',
        'status',
        'is_active'
    ];

    public function type() : BelongsTo {
        return $this->belongsTo(EntityType::class, 'entity_type_id');
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function manager() : BelongsTo {
        return $this->belongsTo(Manager::class);
    }

    public function organization() : BelongsTo {
        return $this->belongsTo(Manager::class);
    }

}
