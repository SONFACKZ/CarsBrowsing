<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image;
use Mail;

class ManageCarsController extends Controller
{
    //
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::with('images')->paginate(2);
        return view('managecars', compact('posts'));
    }

    public function show($id)
    {
        // $details = Post::find($id)::with('images');
        $details = Post::find($id);
        return view('manage-carsdetails', compact('details'));
    }

    public function updatecar($id)
    {
        
        $post = Post::find($id);
    $post->status = 1;
    $post->save();
        // Post::where('id',$id)->update('status', 1);
        return redirect('/manage')->with('success','Article updated successfully.');
    }

    public function delete($id)
    {
        $post = Post::where('id',$id)->first();
        \Mail::send('mailauthordel', array(
            'fullname' => $post['fullname'],
            'email' => $post['email'],
            'carBrand' => $post['carBrand'],
            'releaseYear' => $post['releaseYear'],
            'price' => $post['price'],
            'model' => $post['model'],
        ), function($message) use ($post){
            $message->from('njorku@cars.cm');
            $message->to($post['email'], $post['fullname'])->subject('Njorku cars update');
        });
        Post::where('id',$id)->delete();
        return redirect('/manage')->with('success','Article deleted successfully.');
    }

}
