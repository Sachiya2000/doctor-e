<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar">
            @if(Auth::user()->profile_picture)
                <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile Photo" class="img-fluid rounded-circle">
            @else
                <!-- Default profile photo or placeholder image -->
                <img src="{{ asset('path/to/default/profile/photo.jpg') }}" alt="Default Profile Photo" class="img-fluid rounded-circle">
            @endif
        </div>
      <div class="title">
        <x-dropdown-link :href="route('profile.edit')">
            {{ __('Profile') }}
        </x-dropdown-link>

      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class=""><a href="/home"> <i class="icon-home"></i>Dashboard </a></li>
            <li><a href="/table"> <i class="icon-grid"></i>Tables </a></li>
            <li><a href="{{route('doctor.appoinment.view')}}"> <i class="fa fa-bar-chart"></i>Channeling </a></li>
            <li><a href="/forms"> <i class="icon-padnote"></i>Forms </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Landing Page </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{route('view.service')}}">Services</a></li>
                <li><a href="{{route('view.feedback')}}">Feedback</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li>
            <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
    </ul><span class="heading">Extras</span>
    <ul class="list-unstyled">
      <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
    </ul>
</nav>
