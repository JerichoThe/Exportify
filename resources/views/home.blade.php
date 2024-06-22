@extends('layouts.main')

@section('container')
   <main>

      <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
         <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
               aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
         </div>
         <div class="carousel-inner rounded">
            <div class="carousel-item active">
               <img src="{{ asset('images/home1.png') }}" class="d-block w-100" alt="...">
               <div class="container">
                  <div class="carousel-caption text-start">
                     <p><a class="btn btn-lg btn-primary" href="/login">Join Us</a></p>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img src="{{ asset('images/home1.png') }}" class="d-block w-100" alt="...">
               <div class="container">
                  <div class="carousel-caption">
                     {{-- <h1>Another example headline.</h1> --}}
                     {{-- <p>Some representative placeholder content for the second slide of the carousel.</p> --}}
                     {{-- <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p> --}}
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img src="{{ asset('images/home1.png') }}" class="d-block w-100" alt="...">
               <div class="container">
                  <div class="carousel-caption text-end">
                     {{-- <h1>One more for good measure.</h1> --}}
                     {{-- <p>Some representative placeholder content for the third slide of this carousel.</p> --}}
                     {{-- <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p> --}}
                  </div>
               </div>
            </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
         </button>
      </div>


      <!-- Marketing messaging and featurettes
                           ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
      <hr style="height:2px;border-width:0;color:#126749;background-color:#126749">
      <h1 style="color: #126749;">News</h1>
      <hr style="height:2px;border-width:0;color:#126749;background-color:#126749">
      <div class="container marketing mt-5">

         <!-- Three columns of text below the carousel -->
         <div class="container">
            <div class="row">
               @foreach ($news as $new)
                  <div class="col-md-3">
                     <div class="card mb-3">
                        <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a
                              href="/community?category={{ $new->category->slug }}"
                              class="text-decoration-none text-white">{{ $new->category->name }}</a></div>
                        @if ($new->image)
                           <div style="max-height: 135px; overflow: hidden;">
                              <img src="{{ asset('storage/' . $new->image) }}" class="img-fluid"
                                 alt="{{ $new->category->name }}">
                           </div>
                        @else
                           {{-- <img src="https://source.unsplash.com/1200x400?{{ $new->category->slug }}" class="img-fluid"
                              alt="{{ $new->category->name }}"> --}}
                           <img src="https://loremflickr.com/1200/400/{{ $new->category->slug }}" class="img-fluid"
                              alt="{{ $new->category->name }}">
                        @endif
                        <div class="card-body d-flex flex-column" style="min-height: 330px;">
                           <h5 class="card-title">{{ $new->title }}</h5>
                           <p>
                              <small class="text-muted">{{ $new->created_at->diffForHumans() }}</small>
                           </p>
                           <p class="card-text">{{ $new->excerpt }}</p>
                           <div class="mt-auto">
                              <a href="/posts/{{ $new->slug }}" class="btn btn-success">Read More...</a>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
         <div class="custom-paginator">
            {{ $news->links() }}
         </div>


         <!-- START THE FEATURETTES -->

         <hr style="height:2px;border-width:0;color:#126749;background-color:#126749">
         <h1 style="color: #126749;">Benefits</h1>
         <hr style="height:2px;border-width:0;color:#126749;background-color:#126749">

         <div class="row featurette">
            <div class="col-md-7">
               <h2 class="featurette-heading fw-normal lh-1">Extensive Global Network</h2>
               <p class="lead text-light">Connect with thousands of export-import professionals from around the world and
                  expand
                  your business opportunities by building international relationships.</p>
            </div>
            <div class="col-md-5 align-content-center">
               <img src="{{ asset('images/profile1.png') }}" alt="" class="bd-placeholder-img rounded-circle"
                  width="300" height="300">
            </div>
         </div>

         <hr class="featurette-divider" style="height:2px;border-width:0;color:#126749;background-color:#126749">

         <div class="row featurette">
            <div class="col-md-7 order-md-2">
               <h2 class="featurette-heading fw-normal lh-1">Comprehensive Resources</h2>
               <p class="lead text-light">Access a wide range of articles, guides, and the latest industry tips and stay
                  updated
                  with the most recent trends and best practices in the export-import sector.</p>
            </div>
            <div class="col-md-5 align-content-center">
               <img src="{{ asset('images/profile2.png') }}" alt="" class="bd-placeholder-img rounded-circle"
                  width="300" height="300">
            </div>
         </div>

         <hr class="featurette-divider" style="height:2px;border-width:0;color:#126749;background-color:#126749">

         <div class="row featurette">
            <div class="col-md-7">
               <h2 class="featurette-heading fw-normal lh-1">Networking Opportunities</h2>
               <p class="lead text-light">Join a thriving community where you can find potential partners, clients, and
                  collaborators and build meaningful connections that can lead to new business ventures.</p>
            </div>
            <div class="col-md-5 align-content-center">
               <img src="{{ asset('images/profile3.png') }}" alt="" class="bd-placeholder-img rounded-circle"
                  width="300" height="300">
            </div>
         </div>

         <hr class="featurette-divider" style="height:2px;border-width:0;color:#126749;background-color:#126749">

         <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->
      <div class="gtco-testimonials">
         <h2 class="text-light">Testimonials From Expert</h2>
         <div class="owl-carousel owl-carousel1 owl-theme">
            <div>
               <div class="card text-center"><img class="card-img-top"
                     src="https://images.unsplash.com/photo-1572561300743-2dd367ed0c9a?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=300&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=300"
                     alt="">
                  <div class="card-body">
                     <h5>Ronne Galle <br />
                        <span> Project Manager </span>
                     </h5>
                     <p class="card-text">“ Exportify has been a game-changer for our business. The global network and
                        resources available on the platform have significantly boosted our export-import operations. ” </p>
                  </div>
               </div>
            </div>
            <div>
               <div class="card text-center"><img class="card-img-top"
                     src="https://images.unsplash.com/photo-1588361035994-295e21daa761?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=301"
                     alt="">
                  <div class="card-body">
                     <h5>Missy Limana<br />
                        <span> Engineer </span>
                     </h5>
                     <p class="card-text">“ Joining Exportify was one of the best decisions for my company. The wealth of
                        information and expert support has been invaluable in navigating the complexities of international
                        trade ” </p>
                  </div>
               </div>
            </div>
            <div>
               <div class="card text-center"><img class="card-img-top"
                     src="https://images.unsplash.com/photo-1575377222312-dd1a63a51638?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=302&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=302"
                     alt="">
                  <div class="card-body">
                     <h5>Martha Brown<br />
                        <span> Project Manager </span>
                     </h5>
                     <p class="card-text">“ Exportify has been a game-changer for our business. The global network and
                        resources available on the platform have significantly boosted our export-import operations. ” </p>
                  </div>
               </div>
            </div>
            <div>
               <div class="card text-center"><img class="card-img-top"
                     src="https://images.unsplash.com/photo-1549836938-d278c5d46d20?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=303"
                     alt="">
                  <div class="card-body">
                     <h5>Hanna Lisem<br />
                        <span> Project Manager </span>
                     </h5>
                     <p class="card-text">“ Joining Exportify was one of the best decisions for my company. The wealth of
                        information and expert support has been invaluable in navigating the complexities of international
                        trade ” </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endsection
