<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #388E3C;">
   <div class="container">
      <a class="navbar-brand" href="/home">Exportify.</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
         aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link {{ $active === 'home' ? 'active' : '' }}"href="/home">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">About Us</a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ $active === 'community' ? 'active' : '' }}" href="/community">Community</a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">Categories</a>
            </li>
         </ul>
         <ul class="navbar-nav ms-auto">
            @auth
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">
                     Welcome Back, {{ auth()->user()->name }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-person-gear"></i> My Dashboard</a></li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li>
                        <form action="/logout" method="post">
                           @csrf
                           <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                              Logout</button>
                        </form>
                     </li>
                  </ul>
               </li>
            @else
               <li class="nav-item">
                  <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"><i
                        class="bi bi-box-arrow-in-right"></i> Login</a>
               </li>
            @endauth
         </ul>
      </div>
   </div>
</nav>
