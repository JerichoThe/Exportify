@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">"{{ auth()->user()->name }}" Post</h1>
      <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
   </div>

   <div>
      @if (session()->has('success'))
         <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @endif
      @if (session()->has('error'))
         <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @endif
   </div>

   <div class="container">
      <div class="row">
         @foreach ($posts as $post)
            <div class="col-md-3">
               <div class="card mb-3">
                  <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a
                        href="/community?category={{ $post->category->slug }}"
                        class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                  @if ($post->image)
                     <div style="max-height: 135px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                           alt="{{ $post->category->name }}">
                     </div>
                  @else
                     {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid"
                        alt="{{ $post->category->name }}"> --}}
                     <img src="https://loremflickr.com/1200/400/{{ $post->category->slug }}" class="img-fluid"
                        alt="{{ $post->category->name }}">
                  @endif
                  <div class="card-body d-flex flex-column" style="min-height: 300px;">
                     <h5 class="card-title">{{ $post->title }}</h5>
                     <p class="card-text">{{ $post->excerpt }}</p>
                     <div class="m-2 mt-auto">
                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info mx-2"><span
                              data-feather="eye"></span></a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning mx-2"><span
                              data-feather="edit"></span></a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline mx-2">
                           @csrf
                           @method('delete')
                           <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span
                                 data-feather="x"></span></button>
                        </form>
                        <button class="badge bg-success border-0 open-popup mx-2"
                           data-target-popup="popup-{{ $post->id }}"><span data-feather="dollar-sign"></span></button>
                        <div id="popup-{{ $post->id }}" class="popup">
                           <div class="popup-content">
                              <span class="close">&times;</span>
                              @include('dashboard.posts.pricing.pricing')
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
@endsection
