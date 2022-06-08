<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = ['ma', 'firstname', 'lastname', 'biography'];
    protected $appends = ['fullname'];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'author_id', 'ma');
    }

    public static function getCountAuthor()
    {
        return Author::count();
    }

    public function getFullNameAttribute()
    {
        return "{$this['lastname']} {$this['firstname']}";
    }
    public function scopeSreach($query, $term){
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('ma', 'like', $term)
                ->orWhere('firstname', 'like', $term)
                ->orWhere('lastname', 'like', $term)
                ->orWhere('biography', 'like', $term);
        });
    }
}
