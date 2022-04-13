<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    public function get_category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
    public function service()
    {
        return $this->hasMany(Service::class, 'subCategory_id');
    }

    public function serviceProviders()
    {
        return $this->hasMany(Service::class, 'subCategory_id');
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
        $count = SubCategories::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
}
