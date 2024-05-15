@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Create an Order</h1>
   </div>

   <div class="col lg-8">
      <form method="post" action="/dashboard/user/order" class="mb-5" enctype="multipart/form-data">
         @csrf
         <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
               required autofocus value="{{ old('title', $title) }}" readonly>
            <input type="hidden" name="post_id" value="{{ old('post_id', $post_id) }}">
         </div>
         <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
               required autofocus value="{{ old('author', $author) }}" readonly>
            <input type="hidden" name="user_id" value="{{ old('user_id', $author_id) }}">
         </div>
         <div class="mb-3">
            <label for="pay" class="form-label">Payment receipt</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('pay') is-invalid @enderror" type="file" id="pay" name="pay"
               onchange="previewImage()">
            @error('pay')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <input type="hidden" name="uniqueKey" value="{{ $uniqueKey }}">
         <button type="submit" class="btn btn-primary" name="status" value="createOrder">Submit</button>
      </form>
   </div>

   <script>
      function previewImage() {
         const image = document.querySelector('#pay');
         const imgPreview = document.querySelector('.img-preview');

         imgPreview.style.display = 'block';

         const oFReader = new FileReader();
         oFReader.readAsDataURL(image.files[0]);

         oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
         }
      }
   </script>
@endsection
