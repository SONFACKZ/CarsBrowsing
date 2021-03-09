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

<div class = "container mb-4">
              <!-- Success message -->
              @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
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
        <p class = "col-3">    <a href = "" class = "btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Buy</a></p>
    </div>
  <div class = "row">
          @foreach ($details->images as $image)
          <div class="col-2.8 mr-2 border shadow p-2 mx-auto nounderline">
          <img src="{{ asset('storage/Images/' . $image->filepath) }}" alt = "images..." height = "150" width = "265" class=""/>
          </div>
          @endforeach
  </div>
          <div class = "row p-3">
            <a href = "" class = "btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Buy</a>
          </div>
          


          <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Fill the form to command</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action = "/browse-carsdetails/{id}" method = "POST">
    @csrf
      <div class="modal-body">

        <div class="row form-group">
          <div class="col">
            <label for = "Full name">Fullname</label>
            <input type="text" name = "fullname" class = "form-control {{ $errors->has('fullname') ? 'error' : '' }}" placeholder = "Full Name">
          </div>
        </div>
        <!-- Error -->
        @if ($errors->has('fullname'))
            <div class="error text-danger">
                {{ $errors->first('fullname') }}
            </div>
        @endif

        <div class="row form-group">
            <div class="col">
            <label for = "Email">Email</label>
            <input type="text" name = "email" class = "form-control {{ $errors->has('fullname') ? 'error' : '' }}" placeholder = "Email">
            </div>
        </div>
        <!-- Error -->
        @if ($errors->has('email'))
            <div class="error text-danger">
                {{ $errors->first('email') }}
            </div>
        @endif

        <div class="row form-group">
            <div class="col">
            <label for = "Phone">Phone</label>
            <input type="text" name = "phone" class = "form-control {{ $errors->has('fullname') ? 'error' : '' }}" placeholder = "Phone">
            </div>
        </div>
        <!-- Error -->
        @if ($errors->has('phone'))
            <div class="error text-danger">
                {{ $errors->first('phone') }}
            </div>
        @endif

        <div class="row form-group">
            <div class="col">
            <label for = "Location">Location</label>
            <input type="text" name = "location" class = "form-control {{ $errors->has('fullname') ? 'error' : '' }}" placeholder = "Region & Town">
            </div>
        </div>
        <!-- Error -->
        @if ($errors->has('location'))
            <div class="error text-danger">
                {{ $errors->first('location') }}
            </div>
        @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class = "form-control col-2 btn btn-primary" value = "Submit">
      </div>
    </form>
    </div>
  </div>
</div>



</div>
@endsection