@extends('layouts.main')

@section('container')
   <div class="container">
      <div class="row">
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
         </div>
         @foreach ($categories as $category)
            <div class="col-md-3 ">
               <a href="/community?categories={{ $category->slug }}">
               <div class="card bg-dark text-white mb-4">
                  <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img"
                     alt="{{ $category->name }}">
                  <div class="card-img-overlay d-flex align-items-center p-0">
                     <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                  </div>
               </div>
            </a>
            </div>
         @endforeach
      </div>
   </div>

   {{-- <h1 class="mb-5">Post Categories</h1>
   <ul>
      <li>
         <h2><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h2>
      </li>
   </ul> --}}
@endsection
