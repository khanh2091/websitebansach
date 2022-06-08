<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $table = 'publishers';
    protected $fillable = ['ma', 'name', 'description'];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'publisher_id', 'ma');
    }

    public static function getCountPublisher()
    {
        return Publisher::count();
    }
    public function scopeSreach($query, $term){
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('ma', 'like', $term)
                ->orWhere('name', 'like', $term)
                ->orWhere('description', 'like', $term);
        });
    }
}
