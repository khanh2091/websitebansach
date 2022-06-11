<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['ma', 'title', 'description', 'slug', 'parent_id'];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'ma')->where('status', 'active');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'ma');
    }

    public static function getBySlug($slug)
    {
        return Catagories::where('slug', $slug)->first();
    }

    public static function getParentCategories()
    {
        return Catagories::whereNull('parent_id')->get();
    }

    public static function getListByParent()
    {
        return Catagories::with('children')->whereNull('parent_id')->get();
    }

    public static function getChildrenIds($parent_id)
    {
        return Catagories::where('parent_id', $parent_id)->pluck('id');
    }

    public static function getCountCategory()
    {
        // $data = Category::get()->count();
        // if ($data) {
        //     return $data;
        // }
        return Catagories::get()->count();
    }
}
