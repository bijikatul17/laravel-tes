@extends('layouts.main')

@section('container')


<h1 class="mb-3 text-center" > {{ $title }}</h1>

{{-- SEARCH BOX --}}
<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/posts" method="get">
      <div class="input-group mb-3">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('user'))
            <input type="hidden" name="user" value="{{ request('user') }}">
        @endif
        {{-- @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif --}}
        <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
        <button class="btn btn-danger" type="submit">Search!</button>
      </div>
    </form>
  </div>
</div>

@if ($posts->count() > 0 )
    {{-- HERO BOX --}}
    <div class="card mb-3">
      @if ($posts[0]->image)
          <div style="max-height: 450px;">
              <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
          </div>
      @else
        <img src="https://source.unsplash.com/random/1000×400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
      @endif

      <div class="card-body text-center bg-light text-dark bg-opacity-75 p-0">

        <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>

        <p>
          <small class="text-muted">
              By. <a href="/posts?user={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->username }}</a> 

              in 

              <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>  {{ $posts[0]->created_at->diffForHumans() }}
          </small>
        </p>

        <p class="card-text">{{ $posts[0]->excerpt }}</p>

        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
        
      </div>

    </div>

    {{-- BODY --}}
    <div class="container">
      <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mt-3 mb-3">
            <div class="card" >
              
              <div class="position-absolute px-3 py2 text-white" style="background-color: rgba(0,0,0, 0.7)">
                  <a class="text-decoration-none text-white" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
              </div>

              @if ($post->image)
                  <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->image }}" class="img-fluid ">
              @else
                  <img src="https://source.unsplash.com/random/500×400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
              @endif
              
              

              <div class="card-body">

                <h3 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h3>
                
                <p>
                  <small class="text-muted">
                      By. <a href="/posts?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->username }}</a>
                      {{ $post->created_at->diffForHumans() }}
                  </small>
                </p> 


                <h5 class="card-title">{{ $post->title }}</h5>

                <p class="card-text">
                  {{ $post->excerpt }}
                </p>

                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>

              </div>

            </div>
          </div>
        @endforeach
      </div>
    </div>

    @else 
      <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="d-flex justify-content-end">
      {{ $posts->links() }}
    </div>

@endsection
