<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class SubCategories extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    public function get_category()
    {
        return $this->belongsTo(Categories::class,'category_id','id');
    }
    public function service()
    {
        return $this->hasMany(Service::class,'subCategory_id');
    }

    public function serviceProviders()
    {
        return $this->hasMany(Service::class,'subCategory_id');
    }
}
