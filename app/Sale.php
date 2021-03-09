<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "posts";
    //
    protected $fillable = [
        'filename',
        'status'
    ];
}
