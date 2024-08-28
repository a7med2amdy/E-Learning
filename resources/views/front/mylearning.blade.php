@extends('front.master')
@section('title','My Learning')
@section('More','active')
@section('hero-section')
   @include('front.partials.hero2')
@endsection


@section('page-content')
      <!-- Courses Section -->
      <section id="courses" class="courses section">

        <div class="container">
  
          <div class="row">
            @if (count($myCourses)>0)
              @foreach ( $myCourses as  $mycourse )
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="course-item">
                  <img src="{{ asset('storage/courses/'.$mycourse->course->image) }}"class="img-fluid" alt="...">
                  <div class="course-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <p class="category">{{ $mycourse->course->category->name }}</p>
                      
                      
                    </div>
                    
                    <h3><a href="{{ route('front.courses.show',['course'=>$mycourse->course]) }}">{{ $mycourse->course->name }}</a></h3>
                    <p class="description">{{ $mycourse->course->description }}</p>
                    
                  </div>
                </div>
              </div> <!-- End Course Item-->
    
              @endforeach
            @endif
            
            {{ $myCourses->links('pagination::bootstrap-5') }}
          {{-- {{ $courses::render('bootstrap-4') }} --}}
          </div>
  
        </div>
  
      </section><!-- /Courses Section -->

@endsection