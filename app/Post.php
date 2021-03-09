<?php

namespace App;

use App\Image;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'location',
        'carBrand',
        'model',
        'price',
        'releaseYear',
        'status'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
}
