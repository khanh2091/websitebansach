<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';
    protected $fillable = ['ma', 'name'];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'language_id', 'ma');
    }

    public static function getCountLanguage()
    {
        return Language::count();
    }
}
