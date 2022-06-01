<?php

namespace App\Models;

use App\Traits\KnGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Model
{
    use HasFactory, SoftDeletes, KnGenerator;

    protected $fillable = [
        'kn_id',
        'contact_id',
        'user_id',
        'manager_type_id',
        'is_active',
        'status'
    ];

    public function contact() : BelongsTo {
        return $this->belongsTo(Contact::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function type() : BelongsTo {
        return $this->belongsTo(ManagerType::class, 'manager_type_id');
    }

}
