@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">"{{ auth()->user()->name }}" History Orders</h1>
   </div>
   <div class="col lg-8">
      @if ($historyOrders->count())
         <div class="container">
            <div class="row">
               @foreach ($historyOrders as $history)
                  <div class="col-md-4">
                     <div class="card mb-4">
                        <div class="card-body" style="border: 1.5px solid grey;">
                           <h5 class="card-title">{{ $history->posts->title }}</h5>
                           <p>
                              <small class="text-muted">By {{ $history->author }}
                                 - <br>Order date:<br>
                                 <b
                                    style="color: red">{{ \Carbon\Carbon::parse($history->removed_at)->format('d/m/Y') }}</b>
                              </small>
                           </p>
                           <button class="badge bg-success border-0 mb-2 open-popup"
                              data-target-popup="popup-{{ $history->id }}">View Payment</button>
                           <div id="popup-{{ $history->id }}" class="popup">
                              <div class="popup-content">
                                 <span class="close">&times;</span>
                                 @if ($history->pay)
                                    <h5 class="card-title">{{ $history->title }}</h5>
                                    <div style="max-width: 100%; max-height: 400px; overflow-y: auto; hidden;">
                                       <img src="{{ asset('storage/' . $history->pay) }}" class="img-fluid">
                                    </div>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      @else
         <p class="text-center fs-4 ">No Rejected Order Found.</p>
      @endif
   </div>

   {{ $historyOrders->links() }}
@endsection
