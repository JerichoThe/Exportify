<div class="container py-3">
   <main>
      <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
         <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
               <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Regular</h4>
               </div>
               <div class="card-body">
                  <h1 class="card-title pricing-card-title">$5<small class="text-muted fw-light">/day</small>
                  </h1>
                  <ul class="list-unstyled mt-3 mb-4">
                     <li>Duration: 1 Day</li>
                  </ul>
                  @if (auth()->user()->id == $post->author->id)
                     <form action="/ads" method="post" class="mt-2">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $post->author->id }}">
                        <input type="hidden" name="category_id" value="{{ $post->category->id }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="role" value="1">
                        <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Get
                           Started</button>
                     </form>
                  @endif
               </div>
            </div>
         </div>
         <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
               <div class="card-header py-3 text-white bg-primary border-primary">
                  <h4 class="my-0 fw-normal">Pro</h4>
               </div>
               <div class="card-body">
                  <h1 class="card-title pricing-card-title">$3<small class="text-muted fw-light">/day</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                     <li>Duration: 1Week</li>
                  </ul>
                  @if (auth()->user()->id == $post->author->id)
                     <form action="/ads" method="post" class="mt-2">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $post->author->id }}">
                        <input type="hidden" name="category_id" value="{{ $post->category->id }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="role" value="2">
                        <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Get
                           Started</button>
                     </form>
                  @endif
               </div>
            </div>
         </div>
         <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
               <div class="card-header py-3 text-white bg-primary border-primary">
                  <h4 class="my-0 fw-normal">Enterprise</h4>
               </div>
               <div class="card-body">
                  <h1 class="card-title pricing-card-title">$1<small class="text-muted fw-light">/day</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                     <li>Min: 1Month</li>
                  </ul>
                  <a href="mailto:exportify@exportify.com" style="text-decoration: none"
                     class="w-100 btn btn-lg btn-primary">Contact Us</a>
               </div>
            </div>
         </div>
      </div>
   </main>
</div>
