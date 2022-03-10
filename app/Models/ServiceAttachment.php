<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAttachment extends Model
{
    use HasFactory;
    protected $table = 'service_attachment';

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
