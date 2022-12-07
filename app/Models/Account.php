<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'account_number',
        'type', # 1. for company  2. for users
        'cash',
        'status' #0. not active 1. active
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
