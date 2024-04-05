@extends('layouts.main')

@section('container')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <p>By <a href="/community?author={{ $post->author->username }}"
                  class="text-decoration-none">{{ $post->author->name }}</a>: <a
                  href="//community?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
            </p>
            @if ($post->image)
            <div style="max-height: 350px; overflow: hidden;">
               <img src="{{ asset('storage/' .  $post->image) }}" class="img-fluid mt-3"
                  alt="{{ $post->category->name }}">
            </div>
            @else
               <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3"
                  alt="{{ $post->category->name }}">
            @endif
            <article class="my-3 fs-5">
               <p>{!! $post->body !!}</p>
            </article>

            <a href="/community" class="d-block mb-5">back to community</a>
         </div>
      </div>
   </div>
@endsection
