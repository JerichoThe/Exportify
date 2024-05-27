@extends('layouts.main')

@section('container')
<style>
   .card-img {
       height: 378.5px; 
       object-fit: cover;
   }
</style>
   <div class="container">
      <div class="row">
         <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 text-light">{{ $title }}</h1>
         </div>
         <div class="row justify-content-center">
            <div class="col-md-5 mx-auto">
                <a href="/community?category={{ $category->slug }}">
                    <div class="card bg-dark text-white mb-4">
                        <img src="/images/forum.jpg" class="card-img"
                            alt="community">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)">
                                Community: {{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-5 mx-auto">
                <a href="/chat/{{ $category->slug }}">
                    <div class="card bg-dark text-white mb-4">
                        <img src="/images/chat.jpg" class="card-img"
                            alt="forum">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)">
                                Forum: {{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
      </div>
   </div>
@endsection
