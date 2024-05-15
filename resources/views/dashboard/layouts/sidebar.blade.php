<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
   <div class="position-sticky pt-3">
      <ul class="nav flex-column">
         <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
               <span data-feather="home"></span>
               Profile
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
               <span data-feather="file-text"></span>
               Post/Blog
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user/order">
               <span data-feather="shopping-cart"></span>
               Orders
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/ads*') ? 'active' : '' }}" href="/dashboard/ads/active">
               <span data-feather="sun"></span>
               Active Ads
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/order/rejected*') ? 'active' : '' }}" href="/dashboard/order/rejected">
               <span data-feather="slash"></span>
               Rejected Orders
            </a>
         </li>
      </ul>
      @can('admin')
         <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
         </h6>
         <ul class="nav flex-column">
            <li class="nav-item">
               <a class="nav-link {{ Request::is('dashboard/order/history*') ? 'active' : '' }}" href="/dashboard/order/history">
                  <span data-feather="file"></span>
                  History
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                  <span data-feather="grid"></span>
                  Post Categories
               </a>
            </li>
         </ul>
      @endcan
   </div>
</nav>
