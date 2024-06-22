@extends('layouts.main')

@section('container')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <p>By <a href="/community?author={{ $post->author->name }}"
                  class="text-decoration-none">{{ $post->author->name }}</a>: <a
                  href="//community?category={{ $post->category->slug }}"
                  class="text-decoration-none">{{ $post->category->name }}</a>
               <br>Email: <a href="mailto:{{ $post->author->email }}"
                  style="text-decoration: none">{{ $post->author->email }}</a>
            </p>
            @if ($post->image)
               <div style="max-height: 350px; overflow: hidden;">
                  <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3"
                     alt="{{ $post->category->name }}">
               </div>
            @else
               <img src="https://loremflickr.com/1200/400/{{ $post->category->slug }}" class="img-fluid"
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
                  <a href="mailto:{{ $post->author->email }}" style="text-decoration: none"
                     class="btn btn-lg btn-primary float-md-right">Contact {{ $post->author->name }}</a>
               </div>
            </div>
         </div>

         <!-- Sidebar for related posts or ads -->
         <div class="col-md-3">
            <!-- Related Posts -->
            <div class="related-posts mb-4">
               <h2>Related Forum</h2>

               <a href="/chat/{{ $post->category->slug }}">
                  <div class="card bg-dark text-white mb-4">
                     <img src="/images/chat.jpg" class="card-img" alt="forum">
                     <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-2 fs-5" style="background-color: rgba(0, 0, 0, 0.7)">
                           Forum: {{ $post->category->name }}</h5>
                     </div>
                  </div>
               </a>

            </div>

            <!-- Ads -->
            <div class="ads mb-4">
               <h2>Advertisements</h2>

               <div class="card ad mt-3">
                  @if ($post->image)
                     <div style="max-height: 135px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                           alt="{{ $post->category->name }}">
                     </div>
                  @else
                     {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->slug }}" class="img-fluid"
                           alt="{{ $post->category->name }}"> --}}
                     <img src="https://loremflickr.com/1200/400/{{ $post->category->slug }}" class="img-fluid"
                        alt="{{ $post->category->name }}">
                  @endif
                  <div class="card-body d-flex flex-column">
                     <h5 class="card-title " style="font-size: 0.875rem;">{{ $post->title }}</h5>
                     <div class="mt-auto">
                        <a href="/posts/{{ $post->slug }}" class="badge bg-success"
                           style="text-decoration: none; color: white; background-color: #28a745;"
                           onmouseover="this.style.color='white'; this.style.backgroundColor='#28a745';"
                           onmouseout="this.style.color='white'; this.style.backgroundColor='#28a745';">Read
                           More</a>
                     </div>
                  </div>
               </div>
               <div class="card ad mt-3">
                  @if ($post->image)
                     <div style="max-height: 135px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                           alt="{{ $post->category->name }}">
                     </div>
                  @else
                     {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->slug }}" class="img-fluid"
                           alt="{{ $post->category->name }}"> --}}
                     <img src="https://loremflickr.com/1200/400/{{ $post->category->slug }}" class="img-fluid"
                        alt="{{ $post->category->name }}">
                  @endif
                  <div class="card-body d-flex flex-column">
                     <h5 class="card-title">{{ $post->title }}</h5>
                     <p class="card-text" style="font-size: 0.875rem;">{{ $post->excerpt }}</p>
                     <div class="mt-auto">
                        <a href="/posts/{{ $post->slug }}" class="badge bg-success"
                           style="text-decoration: none; color: white; background-color: #28a745;"
                           onmouseover="this.style.color='white'; this.style.backgroundColor='#28a745';"
                           onmouseout="this.style.color='white'; this.style.backgroundColor='#28a745';">Read
                           More</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
