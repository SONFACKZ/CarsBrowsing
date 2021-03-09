@extends('layouts.app')

@section('content')


<div class="container">
  <h4>Welcome to E-cars selling</h4><hr />
  <div class = "row">
    <div class = "mt-4">
    <h4>Search:</h4>
    </div>
    <div class = "col-2">
    <input type="text" name = "location" class = "form-control mb-2" placeholder = "Location">
    <input type="text" name = "releaseYear" class = "form-control" placeholder = "Release Year">
    </div>
    <div class = "col-2">
    <input type="text" name = "brand" class = "form-control mb-2" placeholder = "Brand">
    <input type="text" name = "price" class = "form-control" placeholder = "Price range">
    </div>
    <div class = "mt-4">
      <input type="submit" class = "form-control btn btn-primary" value = "Search">
    </div>
  </div><hr/>
</div>

<div class = "container">
    <div class = "row">
        <p class = "col-3">Brand: <b>{{$details->carBrand}}</b></p>
        <p class = "col-3">Model: <b>{{$details->model}}</b></p>
        <p class = "col-3">Published on: <b>{{date('d/M/Y h:i:s', strtotime($details->created_at))}}</b></p>
        <p class = "col-3">Author: <b>{{$details->fullname}}</b></p>
    </div>
    <div class = "row">
        <p class = "col-3">Release Year: <b>{{$details->releaseYear}}</b></p>
        <p class = "col-3">Location: <b>{{$details->location}}</b></p>
        <p class = "col-3">Price: <b>XAF {{$details->price}}</b></p>
        <p class = "col-3">
            <a class="btn btn-primary btn-sm mr-1" href="/update-car/{{$details->id}}">Validate</a>
            <a class="btn btn-danger btn-sm" href="/delete-car/{{$details->id}}" onclick="return confirm('Are you sure to delete {{$details->carBrand}} {{$details->model}} {{$details->fullname}}');">Reject</a>
        </p>
    </div>
  <div class = "row">
          @foreach ($details->images as $image)
          <div class="col-2.8 mr-2 border shadow p-2 mx-auto nounderline">
          <img src="{{ asset('storage/Images/' . $image->filepath) }}" alt = "images..." height = "150" width = "265" class=""/>
          </div>
          @endforeach
  </div>
    <div class = "row p-3">       
    <form method = "POST" action = "/manage">
    @method('PUT')
    <input type = "submit" class="btn btn-primary btn-sm mr-1" value = "Validate"/>
    <a class="btn btn-danger btn-sm" href="/delete-car/{{$details->id}}" onclick="return confirm('Are you sure to delete {{$details->carBrand}} {{$details->model}} {{$details->fullname}}');">Reject</a>
    </form>

</div>         

</div>
@endsection