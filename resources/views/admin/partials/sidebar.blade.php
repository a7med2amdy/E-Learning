<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item w-100">
          <a class="nav-link" href="{{ route('front.index') }}">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">Home</span>
          </a>
        </li>

        <li class="nav-item w-100">
          <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fe fe-key fe-16"></i>
            <span class="ml-3 item-text">Dashboard</span>
          </a>
        </li>

        
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>Components</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">

        <x-sidebar-tab-component href="{{ route('admin.trainers.index') }}" icon="fe-user" name="Trainers"></x-sidebar-tab-component> 
        <x-sidebar-tab-component href="{{ route('admin.courses.index') }}" icon="fe-book" name="Courses"></x-sidebar-tab-component>
        <x-sidebar-tab-component href="{{ route('admin.lessons.index') }}" icon="fe-book" name="Lessons"></x-sidebar-tab-component>
        <x-sidebar-tab-component href="{{ route('admin.events.index') }}" icon="fe-bell" name="Event"></x-sidebar-tab-component>
        <x-sidebar-tab-component href="{{ route('admin.messages.index') }}" icon="fe-message-circle" name="Messages"></x-sidebar-tab-component>
        
        

        
       {{-- <x-sidebar-tab-component href="{{ route('admin.services.index') }}" icon="fe-codesandbox" name="Services"></x-sidebar-tab-component>
       
        
        <x-sidebar-tab-component href="{{ route('admin.features.index') }}" icon="fe-feather" name="Features"></x-sidebar-tab-component>
        
        
        
        <x-sidebar-tab-component href="{{ route('admin.subscribers.index') }}" icon="fe-users" name="Subscribers"></x-sidebar-tab-component>
        
        <x-sidebar-tab-component href="{{ route('admin.testmonials.index') }}" icon="fe-check-circle" name="Testmonials"></x-sidebar-tab-component>
        
        <x-sidebar-tab-component href="{{ route('admin.settings.index') }}" icon="fe-settings" name="Settings"></x-sidebar-tab-component>
        --}}

      </ul>  

    </nav>
  </aside>