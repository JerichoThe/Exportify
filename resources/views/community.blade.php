@extends('layouts.main')

@section('container')
   @if (isset($posts[$ads]))
      <div class="card mb-3">
         <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">Ads</div>
         @if ($posts[$ads]->image)
            <div style="max-height: 350px; overflow: hidden;">
               <img src="{{ asset('storage/' . $posts[$ads]->image) }}" class="img-fluid"
                  alt="{{ $posts[$ads]->category->name }}">
            </div>
         @else
            <img src="https://source.unsplash.com/1200x400?{{ $posts[$ads]->category->name }}" class="img-fluid"
               alt="{{ $posts[$ads]->category->name }}">
         @endif
         <div class="card-body text-center">
            <h5 class="card-title"><a href="/posts/{{ $posts[$ads]->slug }}"
                  class="text-decoration-none text-dark">{{ $posts[$ads]->title }}</a></h5>
            <p>
               <small class="text-muted">By <a href="/community?author={{ $posts[$ads]->author->username }}"
                     class="text-decoration-none">{{ $posts[$ads]->author->name }}</a> in <a
                     href="/community?category={{ $posts[$ads]->category->slug }}">{{ $posts[$ads]->category->name }}</a>
                  - {{ $posts[$ads]->created_at->diffForHumans() }}
               </small>
            </p>
            <p class="card-text">{{ $posts[$ads]->excerpt }}</p>
            <a href="/posts/{{ $posts[$ads]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
         </div>
      </div>
   @endif
   <h1 class="mb-5 mt-3 text-center">{{ $title }} :</h1>
   <div class="row justify-content-center">
      <div class="col-md-6">
         <form action="/community">
            @if (request('category'))
               <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
               <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
               <input type="text" class="form-control" placeholder="Search..." name="search"
                  value="{{ request('search') }}">
               <button class="btn text-light" style="background-color: #388E3C" type="submit">Search</button>
            </div>
         </form>
      </div>
   </div>
   @if ($posts->count())
      <div class="container">
         <div class="row">
            @foreach ($posts as $post)
               <div class="col-md-4">
                  <div class="card mb-4">
                     <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a
                           href="/community?category={{ $post->category->slug }}"
                           class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                     @if ($post->image)
                        <div style="max-height: 135px; overflow: hidden;">
                           <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                              alt="{{ $post->category->name }}">
                        </div>
                     @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid"
                           alt="{{ $post->category->name }}">
                     @endif
                     <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p>
                           <small class="text-muted">By <a href="/community?author={{ $post->author->username }}"
                                 class="text-decoration-none">{{ $post->author->name }}</a>
                              - {{ $post->created_at->diffForHumans() }}
                           </small>
                        </p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More...</a>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   @else
      <p class="text-center fs-4 ">No Post Found.</p>
   @endif

   {{ $posts->links() }}
@endsection
