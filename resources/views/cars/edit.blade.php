@extends('layout.app')

@section('title', 'Edit')


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
<form method="POST" action="{{ route('cars.update', $car)}}">
    @csrf
    @method('PATCH')
  <div class="form-group">
    <label for="car-nom">Car Name</label>
    <input type="text" name="nom" 
    value="{{$car->nom}}" class="form-control" id="car-nom" >
  </div>
  <div class="form-group">
    <label for="car-marque">Car Brand</label>
    <input type="text" name="marque" 
    value="{{$car->marque}}"class="form-control" id="car-marque" >
  </div>
  <div class="form-group">
    <label for="car-modèle">Car Model</label>
    <input type="text" name="modèle" 
    value="{{$car->modèle}}" class="form-control" id="car-modèle" >
  </div>
  
  
  <button type="submit" class="btn btn-success"> Update </button>
</form>
</div>
</div>

@endsection