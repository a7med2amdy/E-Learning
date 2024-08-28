@extends('front.master')
@section('title','Event')
@section('events-active','active')
@section('hero-section')
   @include('front.partials.hero2')
@endsection


@section('page-content')
    <!-- Events Section -->
    <section id="events" class="events section">

      <div class="container" data-aos="fade-up">

        <div class="row">
          @if (count($events)>0)
            @foreach ( $events as $event )
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="card">
                <div class="card-img">
                  
                  <img src="{{ asset('storage/events/' . $event->image) }}" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title"><a href="">{{ $event->name }}</a></h5>
                  <p class="fst-italic text-center">{{ $event->day }}</p>
                  <p class="card-text">{{ $event->description }}</p>
                </div>
              </div>
            </div>
            @endforeach
          @endif
          


        </div>

      </div>

    </section><!-- /Events Section -->

@endsection