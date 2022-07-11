@extends('layouts.main')

@section('container')
    <h1 class="mb-5">List of {{ $title }} :</h1>
    {{-- @foreach ($authors as $author) --}}
    @foreach ($users as $user)
        <ul>
            <li>
                {{-- <h2><a href="/posts?user={{ $author->username }}">{{ $author->username }}</a> </h2> --}}
                <h2><a href="/posts?user={{ $user->username }}">{{ $user->username }}</a> </h2>
            </li>
        </ul>
            
    @endforeach

@endsection