@extends('front.master')
@section('title','Trainers')
@section('more-active','active')
@section('hero-section')
   @include('front.partials.hero2')
@endsection


@section('page-content')
    <!-- Trainers Section -->
    <section id="trainers" class="section trainers">

      <div class="container">

        <div class="row gy-5">
          @if (count($trainers)>0)
              @foreach ( $trainers as $trainer )
              <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
                <div class="member-img">
                  <img src="{{ asset('storage/trainers/'.$trainer->image) }}" class="img-fluid" alt="">
                  <div class="social">
                    <a href="https://www.facebook.com/{{ $trainer->facebook }}" target="_blank" rel="noopener noreferrer">
                      <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/{{ $trainer->inestagram }}" target="_blank" rel="noopener noreferrer">
                      <i class="bi bi-instagram"></i>
                  </a>
                    {{-- <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a> --}}
                  </div>
                </div>
                <div class="member-info text-center">
                  <h4>{{ $trainer->name }}</h4>
                  <span>{{ $trainer->specialty }}</span>
                  <p>{{ $trainer->description }}</p>
                </div>
              </div><!-- End Team Member -->
              @endforeach
          
          @endif
          



        </div>

      </div>

    </section><!-- /Trainers Section -->

@endsection