<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class ServiceProvider extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function haveService()
    {
        return $this->hasMany(Service::class,'added_by');
    }
}
