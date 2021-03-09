<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Image;

class UploadController extends Controller
{

    public function uploadForm()
    {
        $Images = Post::paginate(4);
        return view('sale', compact('Images'));
    }

    public function create()
    {
        return view('sale');
    }

    public function uploadSubmit(Request $request)
    {
        $input  =   $request->all();
        $file   =   $request->file('photos');

        $request->validate([
            'fullname'    => 'required', //fullname is the variable name from the html form
            'email'       => 'required',
            'phone'       => 'required',
            'location'    => 'required',
            'carbrand'    => 'required',
            'model'       => 'required',
            'price'       => 'required', //price here is the variable name from the html form
            'releaseyear' => 'required',
            'filepath'    => 'required',
            'status'      => 'required',
            'photos'      => 'required'
        ]);
           $file    =   $request->file('photos');

           if($file)
           {
               $extension   =   $file->getClientOriginalExtension();
               $photos = time().'.' .$extension;
               $file    =   move('storage/Images/', $photos);

               $product =   new Post([
                'fullname'    => $request->get('fullname'), //fullname is the variable name from the html form
                'email'       => $request->get('email'),
                'phone'       => $request->get('phone'),
                'location'    => $request->get('location'),
                'carbrand'    => $request->get('carbrand'),
                'model'       => $request->get('model'),
                'price'       => $request->get('price'), //price here is the variable name from the html form
                'releaseyear' => $request->get('releaseyear'),
                'filepath'    => $request->get('filepath'),
                //'status'      => $request->get(''),
                'photos'      => $photos,
               ]);
               $product->save();
               
               if($product)
               {
                   return redirect('sale')->with('success', 'Article posted successfully');
               }
           }
                return redirect('sale')->with('error', 'Opps! Article fail to post');
        }

        public function show($id)
        {
            $Product    =   Post::find($id);

            return view('browse', compact('Product'));
        }

        // public function edit($id)
        // {
        //     $Product    =   Post::find($id);

        //     return view('edit', compact('Product'));
        // }

        // public function update(Request $request, $id)
        // {
        //     $request->validation([
        //         'status'    =>  'required'
        //     ]);

        //     $input  =   $request->all();
        //     $file   =   $request->file('photos');

        //     if($file)
        //     {

        //     }
        // }
    //
    // public function uploadForm()
    // {
    // return view('sale');
    // }

    // public function uploadSubmit(Request $request)
    // {
    //     $this->validate($request, [
        // 'fullname'    => 'required', //fullname is the variable name from the html form
        // 'email'       => 'required',
        // 'phone'       => 'required',
        // 'location'    => 'required',
        // 'carbrand'    => 'required',
        // 'model'       => 'required',
        // 'price'       => 'required', //price here is the variable name from the html form
        // 'releaseyear' => 'required',
        // 'filepath'        => 'required',
        // 'status'      => 'required',
        // 'photos'      => 'required'
    //     ]);
    // if($request->hasFile('photos'))
    //     {
    //         $allowedfileExtension=['jpeg','jpg','png'];
    //         $files = $request->file('photos');
    //         foreach($files as $file)
    //         {
    //             $filename = $file->getClientOriginalName();
    //             $extension = $file->getClientOriginalExtension();
    //             $check=in_array($extension,$allowedfileExtension);
    //             //dd($check);
    //             if($check)
    //             {
    //                 $items= Post::create($request->all());
    //                 foreach ($request->photos as $photo)
    //                 {
    //                     $filename = $photo->store('photos');
    //                     Image::create([
    //                     'post_id' => $items->id,
    //                     'filename' => $filename
    //                     ]);
    //                 }
    //                 //echo "Upload Successfully";
    //                 // \Mail::send('mail', array(
    //                 //     'name' => $request->get('name'),
    //                 //     'email' => $request->get('email'),
    //                 //     'phone' => $request->get('phone'),
    //                 //     'subject' => $request->get('subject'),
    //                 //     'user_query' => $request->get('message'),
    //                 // ), function($message) use ($request){
    //                 //     $message->from($request->email);
    //                 //     $message->to('elfridsonfack@gmail.com', 'LaraContactForm')->subject($request->get('subject'));
    //                 // });
            
    //                 // return back()->with('success', 'We have received your message and we will get in touch with you very soon.');
            
    //             }
    //             else
    //             {
    //                  echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , jpeg</div>';
    //             }
    //         }
    //     }
    // }

    // public function uploadDocument(Request $request) {
    //     $title = $request->file('fullname');
    //     $email = $request->file('email');
    //     $phone = $request->file('phone');
    //     $location = $request->file('location');
    //     $brand = $request->file('carBrand');
    //     $model = $request->file('model');
    //     $price = $request->file('price');
    //     $release = $request->file('releaseYear');
    //     $status = $request->file('status');
        
    //     // Get the uploades file with name document
    //     $document = $request->file('document');
    //     // Required validation
    //     $request->validate([
    //         'name'          => 'required|max:255',
    //         'fullname'      => 'required|max:255',
    //         'email'         => 'email:rfc,dns',
    //         'phone'         => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
    //         'location'      => 'required|max:255',
    //         'carBrand'      => 'required|max:255',
    //         'model'         => 'required|max:255',
    //         'price'         => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
    //         'releaseYear'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
    //         'status'        => 'required|max:1',
    //         'document'      => 'required'
    //     ]);
    //     // Check if uploaded file size was greater than
    //     // maximum allowed file size
    //     if ($document->getError() == 1) {
    //         $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
    //         $error = 'The document size must be less than ' . $max_size . 'Mb.';
    //         return redirect()->back()->with('flash_danger', $error);
    //     }
        
    //     $data = [
    //         'document' => $document
    //     ];
        
    //     // If upload was successful
    //     // send the email
    //     // $to_email = test@example.com;
    //     // \Mail::to($to_email)->send(new \App\Mail\Upload($data));
    //     // return redirect()->back()->with('flash_success', 'Your document has been uploaded.');
    //  }

}
