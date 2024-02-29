<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_name',
        'theme_img',
        'is_purchase',
    ];

    public function getThemeImgAttribute()
    {
        if ($this->attributes['theme_img']) {
            return asset($this->attributes['theme_img']);
        }
    }
}
