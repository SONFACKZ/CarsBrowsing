<?php

namespace App;

use App\Post;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'post_id',
        'filename',
        'filepath'
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

}
