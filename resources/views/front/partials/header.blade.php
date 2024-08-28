{{-- @php
    $unreadNotificationsCount = auth()->user()->unreadNotifications->count();
@endphp --}}

<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Mentor</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="{{ route('front.index') }}" class="@yield('home-active')">Home<br></a></li>
            <li><a href="{{ route('front.courses') }}" class="@yield('courses-active')">Courses</a></li>
            <li><a href="{{ route('front.event') }}" class="@yield('events-active')">Events</a></li>
            {{-- <li class="dropdown">
                <a href="#" class="@yield('Categories-active')"><span>Categories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="#">Deep Dropdown 4</a></li>
                    <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
            </li> --}}
            
            <li><a href="{{ route('front.contact') }}" class="@yield('contact-active')">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="@yield('more-active')">
                  <span>More</span> 
                  <i class="bi bi-chevron-down toggle-dropdown"></i>
              </a>
              <ul>
                  <li><a href="{{ route('front.myleaning') }}">My Learning</a></li>
                  <li><a href="{{ route('front.trainers') }}">Trainers</a></li>
                  
                  <li><a href="{{ route('front.about') }}">About</a></li>
                  @if (Auth::check())
                  <form method="POST" action="{{ route('logout') }}" onclick="this.closest('form').submit();return false;">
                      @csrf
                      <li><a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;" class="text-danger">Logout</a></li>
                  </form>
                  @endif
              </ul>
          </li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>
          
          <div class="d-flex align-items-center ms-4"> <!-- Added ms-4 for spacing -->
              @if (!Auth::check())

                  <a class="btn-getstarted me-3" href="{{ route('login') }}">Login</a>
                  <div class="d-flex" data-aos="fade-up">
                      <a href="{{ route('register') }}" class="btn-get-started">Register</a>
                  </div>
              @else
              <a href="{{ route('front.cart.index') }}" class="me-3 position-relative" id="cartDropdown" role="button">
                <i class="bi bi-cart"></i>
                <a href="#" class="me-3 notificationsIcon position-relative" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bell"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary" id="notificationsIconCounter" style="font-size: 0.6rem; padding: 2px 4px; display: none;">
                    <!-- Notification count will be injected here by JavaScript -->
                </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="width: 300px;">
                    <!-- Notifications list will be injected here by JavaScript -->
                </ul>
                  
                
                <!-- Notification Dropdown -->
                  {{-- <div class="dropdown"> --}}
                    {{-- <a href="#" class="me-3 notificationsIcon position-relative" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell"></i>
                        @if ( count(Auth::user()->unreadnotifications)  )
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary" id="notificationsIconCounter" style="font-size: 0.6rem; padding: 2px 4px;">
                            {{ count(Auth::user()->unreadnotifications) }} <!-- This would be your dynamic notification count -->
                        </span>
                        @endif
                        
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="width: 300px;">
                        <li class="dropdown-header">Notifications</li>
                        @if (count(Auth::user()->notifications) > 0)
                            @foreach (Auth::user()->notifications->take(6) as $notification)
                                <li style="position: relative;">
                                    <a class="dropdown-item " 
                                       href="{{ route('front.notification.read', $notification->id) }}">
                                        {{ $notification->data['message'] ?? 'No message' }}
                                        <br>
                                        <small style="font-size: 0.73em; margin-left: 14px;">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </small>
                    
                                        @if ($notification->unread())
                                            <span style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); color: blue; font-size: 10px;">&#9679;</span>
                                        @endif
                                    </a>
                                </li>
                            @endforeach  
                        @endif
                    
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="#" class="dropdown-item text-center text-danger">Clear All</a></li>
                    </ul> --}}



                      
                    
                  </div>
          
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="btn btn-danger">Logout</button>
                  </form>
              @endif
          </div>
  </header>


