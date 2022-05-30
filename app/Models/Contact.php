<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'model_id',
        'model',
        'first_name',
        'last_name',
        'middle_name',
        'gender',
        'email',
        'phone',
        'birthplace',
        'birthday',
        'gender',
        'photo',
        'address_id',
        'township_id'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'model_id');
    }

    public function manager() : BelongsTo {
        return $this->belongsTo(Manager::class, 'model_id');
    }

    public function owner() : BelongsTo {
        return $this->belongsTo(Owner::class, 'model_id');
    }


}
