<div class="header_main">
    <div class="mobile_menu">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="logo_mobile"><a href="/"><img src="images/logo.png"></a></div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="#service">Services</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link " href="#blog">Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{route('login')}}">Log In</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link " href="{{route('register')}}">Sign Up</a>
                 </li>
             </ul>
          </div>
       </nav>
    </div>
    <div class="container-fluid">
       <div class="logo"><a href="/"><img src="images/logo.png"></a></div>
       <div class="menu_main">
          <ul>
             <li class="active"><a href="index.html">Home</a></li>
             <li><a href="#about">About</a></li>
             <li><a href="#service">Services</a></li>
             <li><a href="#blog">Blog</a></li>

             @if (Route::has('login'))

             @auth

             <li><a href="{{route('home')}}">Home</a></li>
             @else

             <li><a href="{{route('login')}}">Log In</a></li>

             <li><a href="{{route('register')}}">Sign Up</a></li>
             @endauth

             @endif
          </ul>
       </div>
    </div>
 </div>
