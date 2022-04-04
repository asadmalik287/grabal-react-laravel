<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedTask extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'provider_id',
        'message',
    ];
}
