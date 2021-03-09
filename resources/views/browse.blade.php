@extends('layouts.app')

@section('content')

<div class="container">
  <h4>Welcome to E-cars selling</h4><hr />
  <div class = "row">
    <div class = "mt-4 mr-4">
    <h4>Search:</h4>
    </div>
  <form class = "row" method = "GET" action = "search">
    <div class = "col-4">
        <input type="text" name = "location" class = "form-control mb-2" placeholder = "Location">
        <input type="text" name = "releaseYear" class = "form-control" placeholder = "Release Year">
        </div>
    <div class = "col-4">
        <input type="text" name = "carBrand" class = "form-control mb-2" placeholder = "Brand">
        <input type="text" name = "price" class = "form-control" placeholder = "Price range">
    </div>
    <div class = "mt-4">
      <input type="submit" class = "form-control btn btn-primary" value = "Search">
    </div>
  </form>
  </div><hr/>
</div>

<div class = "container">
  <div class = "row">
      @if(count($posts) > 0)
      <!-- <h4>List of Cars</h4> -->
      @foreach($posts as $a)
        <a href = "browse-carsdetails/{{$a->id}}" class="col-3 border shadow p-2 mb-4 mx-auto nounderline">
          @foreach ($a->images as $image)
          @endforeach
            <img src="{{ asset('storage/Images/' . $image->filepath) }}" alt = "images..." height = "150" width = "265" class=""/>
            <div class="card-body">
              <span class = "col">{{$a->carBrand}} {{$a->model}}</span>
              <span class = "col">{{date('d/M/Y h:i:s', strtotime($a->created_at))}}</span>
            </div>
        </a>
      @endforeach
  @else
  @endif
</div>
{{ $posts->links() }}
</div>
@endsection

