<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssignedTask;

class ServiceProvider extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function services()
    {
        return $this->hasMany(Service::class, 'added_by');
    }
    public function hasTask()
    {
        return $this->hasMany(AssignedTask::class, 'provider_id');
    }
}
