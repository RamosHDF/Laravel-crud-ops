@extends('layout.app')

@section('title', 'Add New Car')


@section('content')
<div class="row">
<div class="col-lg-6 mx-auto" >
    @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
             <li>{{$error}}</li>
             @endforeach
         </ul>
     </div>
     @endif
<form method="POST" action="{{ route('cars.store')}}">
    @csrf
  <div class="form-group">
    <label for="car-nom">Car Name</label>
    <input type="text" name="nom" 
    value="{{old('nom')}}" class="form-control" id="car-nom" >
  </div>
  <div class="form-group">
    <label for="car-marque">Car Brand</label>
    <input type="text" name="marque" 
    value="{{old('marque')}}"class="form-control" id="car-marque" >
  </div>
  <div class="form-group">
    <label for="car-modèle">Car Model</label>
    <input type="text" name="modèle" 
    value="{{old('modèle')}}" class="form-control" id="car-modèle" >
  </div>
  
  
  <button type="submit" class="btn btn-success"> Submit </button>
</form>
</div>
</div>

@endsection