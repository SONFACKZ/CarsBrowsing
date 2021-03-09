<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Post;
use App\Image;

class BrowseController extends Controller
{
    //
    public function index()
    {
        // $posts = Post::OrderBy('id')->get();
        $posts = Post::with('images')->orderBy('id', 'desc')->where('status', 1)->paginate(2);
        // $images= Image::OrderBy('id')->get();
        return view('browse', compact('posts'));
    }

    public function show($id)
    {
        // $details = Post::find($id)::with('images');
        $details = Post::find($id);
        return view('browse-carsdetails', compact('details'));
    }

    public function search()
    {
        $location = $_GET['location'];
        $release = $_GET['releaseYear'];
        $brand = $_GET['carBrand'];
        $price = $_GET['price'];
        $post = Post::with('images')->where('location', 'LIKE', '%'. $location. '%')
           ->where('releaseYear', '=', $release)
           ->where('carBrand', 'LIKE', '%'. $brand. '%')
           ->where('price', '=', $price)
           ->where('status', 1)->paginate(2);
        return view('search', compact('post'));
    }
}
