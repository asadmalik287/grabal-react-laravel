<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function get_sub_categories()
    {
        return $this->hasMany(SubCategories::class, 'category_id', 'id');
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
        $count = Categories::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
}
