<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_img',
        'category_thumbnail',
    ];

    public function getCategoryImgAttribute()
    {
        if ($this->attributes['category_img']) {
            return asset($this->attributes['category_img']);
        }
    }

    public function getCategoryThumbnailAttribute()
    {
        if ($this->attributes['category_thumbnail']) {
            return asset($this->attributes['category_thumbnail']);
        }
    }
}
