@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">"{{ auth()->user()->name }}" Active Ads</h1>
   </div>
   <div class="col lg-8">
      @if ($activeOrders->count())
         <div class="container">
            <div class="row">
               @foreach ($activeOrders as $active)
                  <div class="col-md-4">
                     <div class="card mb-4">
                        <div class="card-body" style="border: 1.5px solid #FF8A08;">
                           <h5 class="card-title">{{ $active->posts->title }}</h5>
                           <p>
                              <small class="text-muted">By {{ $active->author->name }}
                                 - <br>remaining time:<br>
                                 <b style="color: red">{{ \Carbon\Carbon::parse($active->removed_at)->diff(\Carbon\Carbon::now())->format('%d days, %h hours, %i minutes') }}</b>
                              </small>
                           </p>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      @else
         <p class="text-center fs-4 ">No Active Order Found.</p>
      @endif
   </div>

   {{ $activeOrders->links() }}
@endsection
