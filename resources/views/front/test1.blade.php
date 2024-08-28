{{-- @php
  dd($lessons)
@endphp --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Course Details </title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets') }}/img/favicon.png" rel="icon">
  <link href="{{ asset('assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('assets') }}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('assets') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('assets') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets') }}/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="course-details-page">


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
            <li class="dropdown">
                <a href="#" class="@yield('Categories-active')"><span>Categories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="#">Deep Dropdown 4</a></li>
                    <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
            </li>
            <li><a href="{{ route('front.premium') }}" class="@yield('premium-active')">Premium</a></li>
            <li><a href="{{ route('front.contact') }}" class="@yield('contact-active')">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="@yield('more-active')">
                  <span>More</span> 
                  <i class="bi bi-chevron-down toggle-dropdown"></i>
              </a>
              <ul>
                  <li><a href="{{ route('front.trainers') }}">Trainers</a></li>
                  <li><a href="{{ route('front.event') }}">Events</a></li>
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
                  <a href="#" class="me-3"><i class="bi bi-cart"></i></a> <!-- Cart Icon -->
          
                  <!-- Notification Dropdown -->
                  <div class="dropdown">
                      <a href="#" class="me-3" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-bell"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="width: 300px;">
                          <li class="dropdown-header">Notifications</li>
                          <li><a class="dropdown-item" href="#">Notification 1</a></li>
                          <li><a class="dropdown-item" href="#">Notification 2</a></li>
                          <li><a class="dropdown-item" href="#">Notification 3</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a href="#" class="dropdown-item text-center text-danger">Clear All</a></li>
                      </ul>
                  </div>
          
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="btn btn-danger">Logout</button>
                  </form>
              @endif
          </div>
  </header>


  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>{{ $course->name }}</h1>
              <p class="mb-0">{{ $course->description }}</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('front.index') }}">Home</a></li>
            <li class="current">{{ $course->name }}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Courses Course Details Section -->
    <section id="courses-course-details" class="courses-course-details section">

      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <video width="640" height="360" controls>
              <source src="{{ asset('storage/videos/'. $course->video) }}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
            <h3>Course Introduction</h3>
            <p>
              Qui et explicabo voluptatem et ab qui vero et voluptas. Sint voluptates temporibus quam autem. Atque nostrum voluptatum laudantium a doloremque enim et ut dicta. Nostrum ducimus est iure minima totam doloribus nisi ullam deserunt. Corporis aut officiis sit nihil est. Labore aut sapiente aperiam.
              Qui voluptas qui vero ipsum ea voluptatem. Omnis et est. Voluptatem officia voluptatem adipisci et iusto provident doloremque consequatur. Quia et porro est. Et qui corrupti laudantium ipsa.
              Eum quasi saepe aperiam qui delectus quaerat in. Vitae mollitia ipsa quam. Ipsa aut qui numquam eum iste est dolorum. Rem voluptas ut sit ut.
            </p>
          </div>
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Trainer</h5>
              <p><a href="{{ route('front.trainers') }}">{{ $course->trainer->name }}</a></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Course Fee</h5>
              <p>${{ $course->fee }}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Lessons</h5>
              <p>15</p>
            </div>

            {{-- <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Schedule</h5>
              <p>5.00 pm - 7.00 pm</p>
            </div> --}}
            <div class="row mt-2">
              <div class="col-lg-8 ">
                  <form action="#" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-success btn-lg">Add to Cart</button>
                  </form>
              </div>    
            </div>

          </div>
        </div>

      </div>

      
      </div>


    </section><!-- /Courses Course Details Section -->

    <!-- Tabs Section -->
    <section id="tabs" class="tabs section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
              <div class="col-lg-3">
                  <ul class="nav nav-tabs flex-column">
                      @if(count($lessons) > 0)
                          @foreach ($lessons as $index => $lesson)
                              <li class="nav-item">
                                  <a class="nav-link @if($loop->first) active show @endif" data-bs-toggle="tab" href="#tab-{{ $lessons->firstItem() + $loop->index }}">
                                      {{ $lesson->name }}
                                  </a>
                              </li>
                          @endforeach
                      @endif
                  </ul>
              </div>
              <div class="col-lg-9 mt-4 mt-lg-0">
                  <div class="tab-content">
                      @if(count($lessons) > 0)
                          @foreach ($lessons as $index => $lesson)
                              <div class="tab-pane @if($loop->first) active show @endif" id="tab-{{ $lessons->firstItem() + $loop->index }}">
                                  <div class="row">
                                      @if($course->fee == 0 || auth()->user()->hasPurchasedCourse($course->id) || $course->fee == 'free')
                                          <video controls>
                                              <source src="{{ asset('storage/lessons/'. $lesson->video) }}" type="video/mp4">
                                              Your browser does not support the video tag.
                                          </video>
                                      @else
                                          <p>You need to purchase this course to view the lessons.</p>
                                          <a href="#" class="btn btn-primary">Purchase Course</a>
                                      @endif
                                  </div>
                              </div>
                          @endforeach
                      @endif
                  </div>
              </div>
          </div>
      </div>
  </section><!-- /Tabs Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Mentor</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Mentor</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets') }}/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('assets') }}/vendor/aos/aos.js"></script>
  <script src="{{ asset('assets') }}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('assets') }}/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('assets') }}/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets') }}/js/main.js"></script>

</body>

</html>