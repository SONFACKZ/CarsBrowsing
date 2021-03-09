<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostExport implements FromCollection, WithHeadings
{

    public function headings():array
    {
        return [
            "id",
            "fullname",
            "email",
            "phone",
            "location",
            "carBrand",
            "model",
            "price",
            "releaseYear",
            "status",
            "created_at",
            "updated-at"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Post::getPost());
        // return Post::all();
    }
}
