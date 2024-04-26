@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ auth()->user()->name }} Post</h1>
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

   <div class="table-responsive col-lg-8">
      <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
      <table class="table table-striped table-sm">
         <thead>
            <tr>
               <th scope="col">#</th>
               <th scope="col">Title</th>
               <th scope="col">Category</th>
               <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($posts as $post)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->category->name }}</td>
                  <td>
                     <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span
                           data-feather="eye"></span></a>
                     <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span
                           data-feather="edit"></span></a>
                     <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span
                              data-feather="x"></span></button>
                     </form>

                     @if (auth()->user()->id == $post->author->id)
                        <form action="/ads" method="post" class="mt-2">
                           @csrf
                           <input type="hidden" name="user_id" value="{{ $post->author->id }}">
                           <input type="hidden" name="category_id" value="{{ $post->category->id }}">
                           <input type="hidden" name="post_id" value="{{ $post->id }}">
                           <button type="submit" class="badge bg-success border-0"><span
                                 data-feather="dollar-sign"></span></button>
                        </form>
                     @endif
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection
