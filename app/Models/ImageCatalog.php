<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCatalog extends Model
{
    use HasFactory;

    protected $fillable = ['imagefile'];
}