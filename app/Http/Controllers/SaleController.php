<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Sale;
use App\Image;
use App\Post;
use Mail;

class SaleController extends Controller
{
    //
    public function index()
    {
        return view('sale');
        // $images = Sale::all();//orderBy('created_at', 'desc');
        // return view('sale')->with('images', $images);
    }


    public function store(Request $request)
    {
        // images uploading
        // $this->validate($request, [
        //     'fullname'    => 'required', //fullname is the variable name from the html form
        //     'email'       => 'required',
        //     'phone'       => 'required',
        //     'location'    => 'required',
        //     'carBrand'    => 'required',
        //     'model'       => 'required',
        //     'price'       => 'required', //price here is the variable name from the html form
        //     'releaseYear' => 'required',
        //     'filepath'    => 'required',
        //     'status'      => 'required',
        //     'photos'      => 'required'
        // ]);

        if($request->hasFile('photos'))
        {
            $post= Post::create($request->all());//Saving to the database

            $images = $request->file('photos');
            // Uploading images
            foreach($images as $image)
            {
                // Storing the images

                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $pat = $image->storeAs('public/Images', $fileNameToStore);
                    
                // Creating image object
                Image::create([
                    'post_id'  =>$post->id,
                    'filename' =>$filenameWithExt,
                    'filepath' =>$fileNameToStore
                    ]);
            }
        }

        \Mail::send('mailadmin', array(
            'fullname' => $request->get('fullname'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'carBrand' => $request->get('carBrand'),
            'releaseYear' => $request->get('releaseYear'),
            'price' => $request->get('price'),
            'model' => $request->get('model'),
            'id'    =>$post->id,
        ), function($message) use ($request){
            $message->from('njorku@cars.cm');
            $message->to('elfridsonfack@gmail.com', 'SONFACK')->subject('New Car Uploaded');
        });


        \Mail::send('mailauthor', array(
            'fullname' => $request->get('fullname'),
            'carBrand' => $request->get('carBrand'),
            'releaseYear' => $request->get('releaseYear'),
            'price' => $request->get('price'),
            'model' => $request->get('model'),
        ), function($message) use ($request){
            $message->from('njorku@cars.cm');
            $message->to($request->get('email'), $request->get('fullname'))->subject('Your article is under review');
        });


        return redirect('/sale')->with('success','Article created successfully.');
    }
}