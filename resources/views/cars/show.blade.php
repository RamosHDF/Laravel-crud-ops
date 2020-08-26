@extends('layout.app')

@section('title', 'Show Cars')


@section('content')
<div class="card">
  <div class="card-body">
      <h3>Name : {{$car->nom}}</h3>
      <p>Brand : {{$car->marque}}</p>
      <p><b>Model : {{$car->modèle}}</b></p>
  </div>
</div>

@endsection