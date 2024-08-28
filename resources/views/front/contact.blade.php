@extends('front.master')
@section('title','Contact Us')
@section('contact-active','active')
@section('hero-section')
  @include('front.partials.hero2')
@endsection


@section('page-content')
   <!-- Contact Section -->
<section id="contact" class="contact section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <!-- Google Map -->
      <div class="col-lg-6">
        <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
          <iframe style="border:0; width: 100%; height: 100%;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div><!-- End Google Map -->

      <!-- Contact Form -->
      
      <div class="col-lg-6">
        <form action="{{ route('front.message.store') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          @csrf
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
              <x-input-error :messages="$errors->get('subject')" class="mt-2" />
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
              <x-input-error :messages="$errors->get('message')" class="mt-2" />
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit">Send Message</button>
            </div>

          </div>
        </form>
      </div><!-- End Contact Form -->

    </div>
  </div>
</section><!-- /Contact Section -->


@endsection