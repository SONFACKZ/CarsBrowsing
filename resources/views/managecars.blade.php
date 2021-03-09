@extends('layouts.app')

@section('content')

<?php $l= 0; ?>
<div class="container mb-4">
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
</div>
  <div class="row justify-content-md-center mt-4">

  <table class="table table-striped table-hover table-sm table-bordered text-center border shadow p-5 mx-auto">
                <!-- Success message -->
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
        </table>
            @endif
    <!-- <div class="col-9 alert alert-light col-xs-1 text-center"> -->
    @if(count($posts) > 0)
    <h4>List of Cars</h4>
    <table class="table table-striped table-hover mb-4 table-sm table-bordered text-center border shadow p-5 mx-auto">
    <thead class = "thead-dark">
      <th>#</th>
      <th>Images</th>
      <th>Car Brand + Model</th>
      <th>Contact Details</th>
      <th>Date</th>
      <th>Status</th>
      <th>Action</th>
    </thead>
    <tbody>
    @foreach($posts as $a)
    <?php $l++; ?>
    <tr>
    <td>{{$l}}</td>
    <td>
        @foreach ($a->images as $image)
        @endforeach
        <img src="{{ asset('storage/Images/' . $image->filepath) }}" alt = "images..." width = "45" height = "40"/>
        </td>
    <td><h5>{{$a->carBrand}} {{$a->model}}</h5></td>
    <td>
        <h5 class = "col">
          <b>Email: </b>{{$a->email}}<?php echo " <b>|</b> "?>
          <b>Phone: </b>{{$a->phone}}
        </h5>
    </td>
    <td>{{$a->created_at}}</td>
    @if($a->status == 0)
    <td><span class="label label-info">{{'Pending...'}}</span></td>
    @else
    <td><span class="label label-success">  {{'Validated'}}</span></td>
    @endif
    <td>
    <a class="btn btn-primary btn-sm mr-1" href="/manage-carsdetails/{{$a->id}}">View</a>
    <a class="btn btn-danger btn-sm" href="/delete-car/{{$a->id}}" onclick="return confirm('Are you sure to delete {{$a->carBrand}} {{$a->model}} {{$a->fullname}}');">Delete</a>
    </td>
    </tr>
    @endforeach
    </tbody>

    </table>
@else
<table class="table table-striped table-hover table-sm text-center border shadow p-5 mx-auto">
<td>There are no records!</td>
</table>
</div>
@endif

    <!-- </div> -->
  </div>
  {{ $posts->links() }}
@endsection

