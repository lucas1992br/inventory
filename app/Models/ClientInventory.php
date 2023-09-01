<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClientInventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'client_id',
        'computer_name',
        'computer_acount',
        'computer_password',
        'computer_anydesk',
        'computer_anydesk_password',
        'computer_description',
        'computer_location',
        'computer_sector',

    ];
    
    
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function client() : BelongsTo
    {
        return $this->BelongsTo(Client::class);
    }     
}
