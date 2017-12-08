<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getPhotoUrlAttribute($value)
    {
        if (!$value) {
            $value = 'no-image.jpg';
        }
        return $value;
    }
}
