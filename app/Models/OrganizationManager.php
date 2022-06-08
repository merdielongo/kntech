<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrganizationManager extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'manager_id',
        'organization_id',
        'is_activation',
        'status'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function manager() : BelongsTo {
        return $this->belongsTo(Manager::class);
    }

    public function organization() : BelongsTo {
        return $this->belongsTo(Organization::class);
    }

}
