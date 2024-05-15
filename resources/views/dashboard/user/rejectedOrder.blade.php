@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">"{{ auth()->user()->name }}" Rejected Orders</h1>
   </div>
   <div class="col lg-8">
      @if ($rejectedOrders->whereNotNull('removed_at')->count())
         <div class="container">
            <div class="row">
               @foreach ($rejectedOrders as $reject)
                  @if ($reject->status == 'reject')
                     <div class="col-md-4">
                        <div class="card mb-4">
                           <div class="card-body" style="border: 1.5px solid red;">
                              <h5 class="card-title">{{ $reject->posts->title }}</h5>
                              <p>
                                 <small class="text-muted">By {{ $reject->author }}
                                    - <br>rejected date:<br>
                                    <b
                                       style="color: red">{{ \Carbon\Carbon::parse($reject->removed_at)->format('d/m/Y') }}</b>
                                 </small>
                              </p>
                           </div>
                        </div>
                     </div>
                  @endif
               @endforeach
            </div>
         </div>
      @else
         <p class="text-center fs-4 ">No Rejected Order Found.</p>
      @endif
   </div>

   {{ $rejectedOrders->links() }}
@endsection
