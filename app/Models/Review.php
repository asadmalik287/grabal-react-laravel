<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'service_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}
