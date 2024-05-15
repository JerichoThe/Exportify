@extends('layouts.main')

@section('container')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <p>By <a href="/community?author={{ $post->author->username }}"
                  class="text-decoration-none">{{ $post->author->name }}</a>: <a
                  href="//community?category={{ $post->category->slug }}"
                  class="text-decoration-none">{{ $post->category->name }}</a>
            <br>Email: <a href="mailto:{{ $post->author->email }}" style="text-decoration: none">{{ $post->author->email }}</a></p>
            @if ($post->image)
               <div style="max-height: 350px; overflow: hidden;">
                  <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3"
                     alt="{{ $post->category->name }}">
               </div>
            @else
               <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3"
                  alt="{{ $post->category->name }}">
            @endif
            <article class="my-3 fs-5">
               <p>{!! $post->body !!}</p>
            </article>
            <div class="row justify-content-between mb-3">
               <div class="col-md-6">
                   <a href="/community" class="btn btn-lg btn-danger">Back to Community</a>
               </div>
               <div class="col-md-6 justify-content-end d-flex">
                   <a href="mailto:{{ $post->author->email }}" style="text-decoration: none" class="btn btn-lg btn-primary float-md-right">Contact {{ $post->author->username }}</a>
               </div>
           </div>
         </div>
      </div>
   </div>
  
@endsection
