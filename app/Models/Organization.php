<?php

namespace App\Models;

use App\Traits\KnGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory, SoftDeletes, KnGenerator;

    protected $fillable = [
        'kn_id',
        'owner_id',
        'user_id',
        'manager_id',
        'township_id',
        'address_id',
        'name',
        'logo',
        'organization_type_id',
        'status',
        'is_active'
    ];

    public function owner() : BelongsTo {
        return $this->belongsTo(Owner::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function manager() : BelongsTo {
        return $this->belongsTo(Manager::class);
    }

    public function township() : BelongsTo {
        return $this->belongsTo(Township::class);
    }

    public function address() : BelongsTo {
        return $this->belongsTo(Address::class);
    }

    public function type() : BelongsTo {
        return $this->belongsTo(OrganizationType::class, 'organization_type_id');
    }

}
