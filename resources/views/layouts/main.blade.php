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

   {{-- Pusher Script --}}
   <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
   @if (Request::is('chat/*'))
      <script>
         document.addEventListener('DOMContentLoaded', function() {
            var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
               cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
            });

            var channel = pusher.subscribe('public-chat-{{ $category }}');
            channel.bind('App\\Events\\MessageSent', function(data) {
               var chatBox = document.getElementById('chat-box');
               chatBox.innerHTML += '<p><strong>' + data.user + ':</strong> ' + data.message + '</p>';
               chatBox.scrollTop = chatBox.scrollHeight;
            });
            // Scroll to bottom on page load
            var chatBox = document.getElementById('chat-box');
            chatBox.scrollTop = chatBox.scrollHeight;
         });
      </script>
   @endif

   <title>Exportify | {{ $title }}</title>
</head>

@if (!request()->is('login') && !request()->is('register'))

   <body
      style="background-image: url('/images/2.jpeg'); background-size: cover; background-repeat: no-repeat; backdrop-filter: blur(7px);">
   @else

      <body>
@endif
@include('partials.navbar')
<div class="container mt-4">
   @yield('container')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@if (Request::is('chat/*'))
   <script>
      document.getElementById('chat-form').addEventListener('submit', function(e) {
         e.preventDefault();

         var user = document.getElementById('user').value;
         var message = document.getElementById('message').value;

         fetch('/send-message/{{ $category }}', {
               method: 'POST',
               headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
               },
               body: JSON.stringify({
                  user: user,
                  message: message
               })
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));

         document.getElementById('message').value = '';
      });
   </script>
@endif
</body>
@if (!request()->is('login') && !request()->is('register'))
   @include('partials.footer')
@endif

</html>
