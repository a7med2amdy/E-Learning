@extends('front.master')
@section('title','Courses')
@section('courses-active','active')
@section('hero-section')
   @include('front.partials.hero2')
@endsection


@section('page-content')
      <!-- Courses Section -->
      <section id="courses" class="courses section">

        <div class="container">
  
          <div class="row">
            @if (count($courses)>0)
              @foreach ( $courses as  $course )
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="course-item">
                  <img src="{{ asset('storage/courses/'.$course->image) }}"class="img-fluid" alt="...">
                  <div class="course-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <p class="category">{{ $course->category->name }}</p>
                      @if ($course->fee !== 'free' && $course->fee != 0)
                          <p class="price">${{ $course->fee }}</p>
                      @else
                          <p class="price">free</p>
                      @endif
                      
                    </div>
                    
                    <h3><a href="{{ route('front.courses.show',['course'=>$course]) }}">{{ $course->name }}</a></h3>
                    <p class="description">{{ $course->description }}</p>
                    <div class="trainer d-flex justify-content-between align-items-center">
                      <div class="trainer-profile d-flex align-items-center">
                        <img src="{{ asset('storage/trainers/'.$course->trainer->image) }}" class="img-fluid" alt="">
                        
                        <a href="{{ route('front.trainers') }}" class="trainer-link">{{$course->trainer->name}}</a>
                      </div>
                      <div class="trainer-rank d-flex align-items-center">
                        <i class="bi bi-person user-icon"></i>&nbsp;50
                        &nbsp;&nbsp;
                        <i class="bi bi-heart heart-icon"></i>&nbsp;65
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- End Course Item-->
    
              @endforeach
            @endif
            
            {{ $courses->links('pagination::bootstrap-5') }}
          {{-- {{ $courses::render('bootstrap-4') }} --}}
          </div>
  
        </div>
  
      </section><!-- /Courses Section -->

@endsection