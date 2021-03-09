@extends('layouts.app')

@section('content')


<div class="container">
  <h4>Welcome to E-cars selling</h4><br />
  <div class="row justify-content-md-center mt-2">
    <div class="col-8 alert alert-light col-xs-1 text-center border shadow p-5 mx-auto">
    <h4>Now, you can sale Cars</h4><hr />
          <!-- Success message -->
          @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            
      <form action = "/sale" method = "POST" enctype = "multipart/form-data" id = "upload-form" name = "upload">
      @csrf

        <div class="row form-group">
          <div class="col">
            <label for = "Full name">Fullname</label>
            <input type="text" name = "fullname" class = "form-control {{ $errors->has('fullname') ? 'error' : '' }}" placeholder = "Full Name">
          </div>
            <!-- Error -->
            @if ($errors->has('fullname'))
            <div class="error text-danger">
                {{ $errors->first('fullname') }}
            </div>
            @endif

            <div class="col">
            <label for = "Email">Email</label>
            <input type="text" name = "email" class = "form-control {{ $errors->has('email') ? 'error' : '' }}" placeholder = "Email">
          </div>
            <!-- Error -->
            @if ($errors->has('email'))
            <div class="error text-danger">
                {{ $errors->first('email') }}
            </div>
            @endif

        </div>


        <div class="row form-group">
          <div class="col">
            <label for = "Phone">Phone number</label>
            <input type="text" name = "phone" class = "form-control {{ $errors->has('phone') ? 'error' : '' }}" placeholder = "Phone number">
          </div>
            <!-- Error -->
            @if ($errors->has('phone'))
            <div class="error text-danger">
                {{ $errors->first('phone') }}
            </div>
            @endif

            <div class="col">
            <label for = "Location">Region & Town</label>
            <input type="text" name = "location" class = "form-control {{ $errors->has('location') ? 'error' : '' }}" placeholder = "Location (Town, Region)">
          </div>
            <!-- Error -->
            @if ($errors->has('location'))
            <div class="error text-danger">
                {{ $errors->first('location') }}
            </div>
            @endif
        </div>

        <div class="row form-group">
          <div class="col">
            <label for = "Brand">Car Brand</label>
            <input type="text" name = "carBrand" class = "form-control {{ $errors->has('carBrand') ? 'error' : '' }}" placeholder = "Car Brand">
          </div>
            <!-- Error -->
            @if ($errors->has('carbrand'))
            <div class="error text-danger">
                {{ $errors->first('carbrand') }}
            </div>
            @endif

            <div class="col">
            <label for = "Model">Car Model</label>
            <input type="text" name = "model" class = "form-control {{ $errors->has('model') ? 'error' : '' }}" placeholder = "Car Model">
          </div>
            <!-- Error -->
            @if ($errors->has('model'))
            <div class="error text-danger">
                {{ $errors->first('model') }}
            </div>
            @endif
        </div>


        <div class="row form-group">
          <div class="col">
            <label for = "Price">Price</label>
            <input type="text" name = "price" class = "form-control {{ $errors->has('price') ? 'error' : '' }}" placeholder = "Price">
          </div>
            <!-- Error -->
            @if ($errors->has('price'))
            <div class="error text-danger">
                {{ $errors->first('price') }}
            </div>
            @endif

            <div class="col">
            <label for = "Release Year">Release Year</label>
            <input type="text" name = "releaseYear" class = "form-control {{ $errors->has('releaseYear') ? 'error' : '' }}" placeholder = "Release Year">
          </div>
            <!-- Error -->
            @if ($errors->has('releaseyear'))
            <div class="error text-danger">
                {{ $errors->first('releaseyear') }}
            </div>
            @endif
        </div>

        
        <div class="row form-group">
          <div class="col">
            <label for = "images">Upload Images</label>
            <input type="file" multiple = "multiple" class = "form-control {{ $errors->has('photos') ? 'error' : '' }}" id = "images" name = "photos[]">
          </div>
      <!-- Error -->
    @if ($errors->has('photos'))
    <div class="error text-danger">
        {{ $errors->first('photos') }}
    </div>
    @endif
        </div>

        <div class="row form-group">
          <div class="col">
            <input type="submit" class = "form-control btn btn-primary" value = "Upload">
          </div>
        </div>

      </form>
    </div>
  </div>

 
</div>
@endsection

