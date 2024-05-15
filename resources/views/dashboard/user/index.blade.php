@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">"{{ auth()->user()->name }}" Orders</h1>
   </div>
   <div class="mt-3">
      @if (session()->has('success'))
         <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @endif
      @if (session()->has('error'))
         <div class="alert alert-danger alert-dismissible fade show col-lg-8 mt-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @endif
   </div>
   <div class="col lg-8">
      @if ($orders->count() && $orders->whereNull('removed_at')->count() != 0)
         <div class="container">
            <div class="row">
               @foreach ($orders as $order)
                  @if (!$order->removed_at)
                     <div class="col-md-4">
                        <div class="card mb-4">
                           <div class="card-body" style="border: 1.5px solid green;">
                              <h5 class="card-title">{{ $order->title }}</h5>
                              <p>
                                 <small class="text-muted">By {{ $order->author }}
                                    - {{ $order->created_at->diffForHumans() }}
                                 </small>
                              </p>
                              <button class="badge bg-success border-0 mb-2 open-popup"
                                 data-target-popup="popup-{{ $order->id }}">View Payment</button>
                              @can('admin')
                                 <form method="post" action="/dashboard/user/order" class="mb-5"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <button type="submit" class="btn btn-primary" name="status"
                                       value="approve">Approve</button>
                                    <button type="submit" class="btn btn-danger" name="status"
                                       value="reject">Reject</button>
                                 </form>
                              @endcan

                              <div id="popup-{{ $order->id }}" class="popup">
                                 <div class="popup-content">
                                    <span class="close">&times;</span>
                                    @if ($order->pay)
                                       <h5 class="card-title">{{ $order->title }}</h5>
                                       <div style="max-width: 100%; max-height: 400px; overflow-y: auto; hidden;">
                                          <img src="{{ asset('storage/' . $order->pay) }}" class="img-fluid">
                                       </div>
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  @endif
               @endforeach
            </div>
         </div>
      @else
         <p class="text-center fs-4 ">No Order Found.</p>
      @endif
   </div>

   {{ $orders->links() }}
@endsection
