<?php

namespace App\Models;

use App\Models\Categories;
use App\Models\ServiceProvider;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public function get_service_category()
    {
        return $this->hasOne(Categories::class, 'category_id', 'id');
    }
    public function haveProvider()
    {
        return $this->belongsTo(ServiceProvider::class, 'added_by');
    }
    public function hasCategory()
    {
        return $this->hasOne(Categories::class,'id','category_id');
    }
    public function hasSubCategory()
    {
        return $this->hasOne(SubCategories::class,'id','subCategory_id');
    }
}
