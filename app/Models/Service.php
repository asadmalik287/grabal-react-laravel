<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public function get_service_category()
    {
        return $this->hasOne(Categories::class,'category_id','id');
    }
    // public function get_service_subcategory()
    // {
    //     return $this->hasOne(SubCategories::class,'subCategory_id','id');
    // }
}
