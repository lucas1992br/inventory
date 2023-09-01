<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_name',
        'client_address',
        'client_telephone',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function clientInventory() : HasMany
    {
        return $this->hasMany(ClientInventory::class);
    }
}
