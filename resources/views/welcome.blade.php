@extends('layouts.app')

@section('content')


<div class="container">
<h4>Welcome to E-cars selling</h4>
  <div class="row justify-content-md-center mt-4 pt-5">
    <div class="col-9 col-xs-1 text-center">
    <a href = "{{ route('browse') }}" class = "border shadow p-5 mx-auto col-5 pt-4 pb-4 btn btn-primary mr-2" role = "button"><b>Browse Cars</b></a>
    <a href = "{{ route('sale') }}" class = "border shadow p-5 mx-auto col-5 pt-4 pb-4 btn btn-success"><b>Sale cars</b></a>
    </div>
  </div>
@endsection
