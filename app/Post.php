<?php

namespace App;

use App\Image;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

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

    public static function getPost()
    {
        $records = DB::table('posts')
        ->select("id", "fullname", "email", "phone", "location", "carBrand", "model", "price", "releaseYear", "status", "created_at", "updated-at")
        ->orderBy('id', 'asc')->get()->toArray();
    }
    
}
