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

<body>
   @include('partials.navbar')
   <div class="container mt-4">
      @yield('container')
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<footer class="text-light py-4" style="background-color: #0A6847;">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <h5>About Exportify</h5>
            <p>Exportify is a platform dedicated to promoting Indonesia's local economy through exporting local goods
               globally. As a creation of our nation's youth, Exportify aims to showcase Indonesia's rich cultural
               heritage and diverse products to the world stage. Join us in our mission to empower local artisans and
               businesses while contributing to the growth of Indonesia's economy</p>
            <span class="text-body-secondary">&copy; 2024 Exportify, Inc</span>

         </div>
         <div class="col-md-6 d-flex justify-content-end">
            <div>
               <h5>Connect with Us</h5>
               <ul class="list-unstyled">
                  <li><a href="#" class="bi bi-facebook text-decoration-none text-light"> Facebook</a></li>
                  <li><a href="#" class="bi bi-twitter text-decoration-none text-light"> Twitter</a></li>
                  <li><a href="#" class="bi bi-instagram text-decoration-none text-light"> Instagram</a></li>
                  <li><a href="#" class="bi bi-linkedin text-decoration-none text-light"> LinkedIn</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</footer>

</html>
