@extends('layouts.main')

@section('container')
   <div>
      <h1>Public Chat - {{ $category }}</h1>
      <div style="display: flex; justify-content: flex-end;">
         <input class="mb-3 text-light" style="background-color: #388E3C" value="{{ Auth::user()->name }}" placeholder="Your name" disabled>
     </div>
     
      <div id="chat-box" style="height: 340px; border: 1.5px solid #388E3C; overflow-y: scroll; margin-bottom: 20px; background-color: rgba(56, 142, 60, 0.5);">
         <!-- Display existing messages -->
         @foreach ($messages as $message)
            <p><strong>{{ $message->user }}:</strong> {{ $message->message }}</p>
         @endforeach
      </div>
      <form class="mb-3" id="chat-form" style="display: flex; align-items: center;">
         <input type="text" id="user" value="{{ Auth::user()->name }}" placeholder="Your name" hidden>
         <input class="form-control" type="text" id="message" placeholder="Type a message" style="flex: 1; margin-right: 10px;" required>
         <button class="btn btn-success" type="submit">Send</button>
     </form>     
      @can('admin')
         <form method="POST" action="/delete-messages/{{ $category }}">
            @csrf
            <button class="mb-3 btn btn-danger" type="submit">Delete All Messages</button>
         </form>
      @endcan
   </div>
@endsection
