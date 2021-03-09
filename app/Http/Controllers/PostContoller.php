<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostContoller extends Controller
{
    //
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('books.index',compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'body' =>'required',
        ]);
        //Post::create($request->all());
        Post::create([
            'title' =>$request->get('title'),
            'body' =>$request->get('body'),
        ]);
        if($request->hasFile('photo_id'))
        {
            $file = $request->file('photo_id');
            foreach($files as $file)
            {
                $name = time().'-'.$file->getClientOriginalName();
                $name = str_replace(' ', '-', $name);
                $file->move('post-images', $name);
                $post->image()->create(['name' => $name]);
            }
        }

        // Books::create($request->all());
   
        return redirect()->route('books.index')
                        ->with('success','Article Created successfully.');
    }
 
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('books.show',compact('book'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('books.edit',compact('book'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'book_name' =>'required',
            'category' =>'required',
            'row'      =>'required',
            'room'     =>'required',
            'resume'  =>'required'
        ]);
  
        $post->update($request->all());
  
        return redirect()->route('books.index')
                        ->with('success','Status updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
  
        return redirect()->route('books.index')
                        ->with('success','Article deleted successfully');
    }
}
