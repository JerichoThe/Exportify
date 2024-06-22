@extends('layouts.main')

@section('container')
   <h1 class="text-center text-success mb-5">The History of Exportify</h1>
   <div class="row featurette mb-5">
      <div class="col-md-7 order-md-2 align-content-center">
         <h3 class="text-light fw-normal">Exportify was founded in 2018 by a group of passionate entrepreneurs and trade
            professionals who recognized a significant gap in the export-import industry. They observed that while global
            trade was rapidly expanding, there was a lack of a comprehensive, supportive community where individuals and
            businesses could connect, share knowledge, and grow together.</h3>
      </div>
      <div class="col-md-5 align-content-center">
         <img src="{{ asset('images/aboutus.png') }}" alt="" class="bd-placeholder-img rounded-1" width="450"
            height="300">
      </div>
   </div>
   <div class="row mb-4">
      <div class="col">
         <div class="text-center justify-content-start">
            <h3 class="text-center text-success">
               Vision
            </h3>
            <div class="d-flex justify-content-center">
               <p class="fw-normal text-center text-light" style="width: 50%;">
                  To become the leading global community for export-import professionals, fostering collaboration,
                  innovation, and growth in international trade.
               </p>
            </div>
         </div>
      </div>
      <div class="separator"></div>
      <div class="col">
         <div class="justify-content-end">
            <h3 class="text-center text-success">
               Mission
            </h3>
         </div>
         <div class="d-flex justify-content-center">
            <p class="fw-normal text-center text-light" style="width: 50%;">
               Empowering businesses and individuals in the export-import industry by providing comprehensive resources,
               expert guidance, and a supportive network to navigate and excel in the global marketplace.
            </p>
         </div>
      </div>
   </div>
   <hr style="height:2px;border-width:0;color:#126749;background-color:#126749">
         <h1 style="color: #126749;">Achievement</h1>
         <hr style="height:2px;border-width:0;color:#126749;background-color:#126749">
   <div class="container">
      <div class="row mb-4 text-center">
         <div class="col">
            <div class="text-center justify-content-start">
               <img src="{{ asset('images/achievement.jpeg') }}" alt="" class="bd-placeholder-img rounded-circle"
                  width="100" height="100">
               <h3 class="text-center">Global Connectivity Award (2019)</h3>
               <div class="d-flex justify-content-center">
                  <p class="text-center text-light" style="width: 100%;">
                     Awarded by the International Trade Association for outstanding contributions to connecting global trade professionals through our innovative platform.
                  </p>
               </div>
            </div>
         </div>
         <div class="col">
            <div class="text-center justify-content-start">
               <img src="{{ asset('images/achievement.jpeg') }}" alt="" class="bd-placeholder-img rounded-circle"
                  width="100" height="100">
               <h3 class="text-center">Excellence in Industry Education (2021)</h3>
               <div class="d-flex justify-content-center">
                  <p class="text-center text-light" style="width: 100%;">
                     Presented by the Trade Educators Forum for our exceptional webinars, courses, and educational materials that have significantly enhanced the knowledge and skills of our community members.
                  </p>
               </div>
            </div>
         </div>
         <div class="col">
            <div class="text-center justify-content-start">
               <img src="{{ asset('images/achievement.jpeg') }}" alt="" class="bd-placeholder-img rounded-circle"
                  width="100" height="100">
               <h3 class="text-center">Community Impact Award (2022)</h3>
               <div class="d-flex justify-content-center">
                  <p class="text-center text-light" style="width: 100%;">
                     Honored by the International Business Council for creating a supportive and dynamic community that fosters collaboration and growth among export-import professionals.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
