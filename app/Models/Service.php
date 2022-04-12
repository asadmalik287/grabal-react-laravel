<?php

namespace App\Models;

use App\Models\AssignedTask;
use App\Models\Categories;
use App\Models\ServiceAttachment;
use App\Models\ServiceProvider;
use App\Models\SubCategories;
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
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function hasAttachment()
    {
        return $this->hasMany(ServiceAttachment::class, 'service_id');
    }

    public function assignedTask()
    {
        return $this->hasMany(AssignedTask::class, 'service_id');
    }
    public function subcat()
    {
        return $this->belongsTo(SubCategories::class, 'subCategory_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'service_id');
    }

    public function averageReviews()
    {
        return $this->hasMany(Review::class, 'service_id')
            ->selectRaw('service_id,AVG(reviews.rating) AS average_rating')
            ->groupBy('service_id');
    }

    public function providers()
    {
        return $this->belongsTo($this, 'added_by');
    }

    public function setSlugAttribute($title)
    {
        $this->attributes['slug'] = $this->uniqueSlug($title);
    }

    private function uniqueSlug($title)
    {
        $slug = str_replace(' ', '-', strtolower($title)); // Replaces all spaces with hyphens.
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug); // Removes special chars.
        $slug = preg_replace('/-+/', '-', $slug); // Replaces multiple hyphens with single one.
        $count = Service::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }

}
