@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post->title }}</h2>

                <p>By. <a href="/posts?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->username }}</a> 
                    in
                <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                    
                @if ($post->image)
                    <div>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->image }}" class="img-fluid  my-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/random/1200×400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/posts" class="text-decoration-none d-block mt-3">Back to All Users's Posts</a>

            </div>
        </div>
    </div>
@endsection