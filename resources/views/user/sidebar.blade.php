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
            <li><a href="/table"> <i class="icon-grid"></i>History </a></li>
            <li><a href="charts.html"> <i class="fa fa-bar-chart"></i> Profile </a></li>
            <li><a href="{{route('add.feedback')}}"> <i class="icon-padnote"></i>Feedback </a></li>

            <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
    </ul>

</nav>
