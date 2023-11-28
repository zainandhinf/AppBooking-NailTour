<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Catalog extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'slug', 'location', 'price', 'description', 'main_image', 'categories'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function find($slug)
    {
        return self::where('slug', $slug)->first();
    }
}