@include('front.partials.head')


<body class="index-page">
  
    @include('front.partials.header')

  <main class="main">

     @yield('hero-section')
    {{-- @include('front.partials.hero')  ||  @include('front.partials.hero2')  --}}

    

    @yield('page-content')
    

  </main>

    @include('front.partials.footer')


    @include('front.partials.scripts')
  

</body>

</html>