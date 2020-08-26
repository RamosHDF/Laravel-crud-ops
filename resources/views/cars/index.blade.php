@extends('layout.app')

@section('title', 'Add New Car')


@section('content')
<a href="{{ route('cars.create')}}" class="btn btn-success">Add New Car</a>

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success')}}
</div>
@endif

<table class="table table-dark mt-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Car Name</th>
      <th scope="col">Car Brand</th>
      <th scope="col">Car Model</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
      @foreach($cars as $car)
    <tr>
      <th scope="row">{{ $car->id}}</th>
      <td>{{ $car->nom}}</td>
      <td>{{ $car->marque}}</td>
      <td>{{ $car->modèle}}</td>
      <td class="table-buttons">
      <a href="{{ route('cars.show', $car)}}" class="btn btn-success"> 
      <i class="fa fa-eye" ></i>
      </a>
      <a href="{{ route('cars.edit',$car)}}" class="btn btn-primary"> 
      <i class="fa fa-pencil" ></i>
      </a>
  
      
      <form method="POST" action="{{ route('cars.destroy',$car)}}">
      @csrf 
      @method('DELETE')
      <button type="submit" class="btn btn-danger"> 
      <i class="fa fa-trash" ></i>
      </button>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection