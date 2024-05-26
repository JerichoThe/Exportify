<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!-- Bootstrap Icons -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/footers/">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

   {{-- Style Css --}}
   <link rel="stylesheet" href="/css/style.css">

   <title>Exportify | {{ $title }}</title>
</head>

@if (!request()->is('login') && !request()->is('register'))
   <body style="background-image: url('/images/2.jpeg'); background-size: cover; background-repeat: no-repeat; backdrop-filter: blur(7px);">
@else
   <body>
@endif
   @include('partials.navbar')
   <div class="container mt-4">
      @yield('container')
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
@if (!request()->is('login') && !request()->is('register'))
   @include('partials.footer')
@endif

</html>
