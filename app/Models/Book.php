<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helpers;
class Book extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['ma', 'title', 'description', 'quantity', 'status', 'slug', 'images', 'price', 'sold', 'discount', 'category_id', 'language_id', 'author_id', 'publisher_id', 'page_number', 'publication_date', 'reprint_date'];

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'ma', 'category_id');
    }

    public function author()
    {
        return $this->hasOne('App\Models\Author', 'ma', 'author_id');
    }

    public function publisher()
    {
        return $this->hasOne('App\Models\Publisher', 'ma', 'publisher_id');
    }

    public function language()
    {
        return $this->hasOne('App\Models\Language', 'ma', 'language_id');
    }

    public static function getBySlug($slug)
    {
        return Book::where('slug', $slug)->first();
    }

    // public static function getCountActiveProduct()
    // {
    //     $data = Book::where('status', 'active')->count();
    //     if ($data) {
    //         return $data;
    //     }
    //     return 0;
    // }
}
