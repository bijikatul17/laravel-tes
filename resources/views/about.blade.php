@extends('layouts.main')

@section('container')
    <h1>Halaman {{ $title }}</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/thumb/{{ $image }}" 
    alt="img/thumb/{{ $image }}" width="150" class="img-thumbnail rounded-circle">
    <div class="clearfix"></div>
@endsection

    
