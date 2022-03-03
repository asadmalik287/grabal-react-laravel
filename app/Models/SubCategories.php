<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;
    public function get_category()
    {
        return $this->belongsTo(Categories::class,'category_id','id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class,'subCategory_id','id');
    }
}
