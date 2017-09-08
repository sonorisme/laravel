<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'Laravel')}}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/laravel/css/style.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Bootstrap core CSS -->
    <link href="/laravel/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Custom fonts for this template -->
    <link href="/laravel/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="/laravel/css/freelancer.css" rel="stylesheet">
    @yield('style')

  </head>

  <body id="page-top">
    <div id="app">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{url('/')}}">Hello Laravel</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            @if(Request::url() == '/') 
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Recent Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{$navPath[0]}}">Recent Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{$navPath[1]}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{$navPath[2]}}">Contact</a>
            </li>
            @endif
            @if (Auth::guest())
               <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a></li>
               <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a></li>
            @else
               <li class="dropdown nav-item">
                   <a href="#" class="dropdown-toggle nav-link js-scroll-trigger" data-toggle="dropdown" role="button" aria-expanded="false">
                       Hello {{ Auth::user()->name }} <span class="caret"></span>
                   </a>

                   <ul class="dropdown-menu" role="menu">
                       <li class="nav-item">
                           <a class="nav-link js-scroll-trigger" href="{{ route('posts.index') }}">
                               Posts
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link js-scroll-trigger" href="{{ route('categories.index') }}">
                               Categories
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link js-scroll-trigger" href="{{ route('tags.index') }}">
                               Tags
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link js-scroll-trigger" href="{{ route('contact.get') }}">
                               Contact
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                               Logout
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                           </form>
                       </li>                                  
                   </ul>
               </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    @if (Session::has('success'))
      <div class="alert alert-success top-first-padding">
        <p>Success: {{Session::get('success')}}</p>
      </div>
    @endif
    @if (count($errors) > 0)
      <ul class="top-first-padding">
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      </ul>
    @endif

    @yield('content')
    </div>


     <!-- Footer -->
    <footer class="text-center">
      <div class="footer-above">
        <div class="container">
          <div class="row">
            <div class="footer-col col-md-4">
              <h4>Location</h4>
              <p>Ryde
                <br>Sydney, NSW 2112</p>
            </div>
            <div class="footer-col col-md-4">
              <h4>Contact Me</h4>
              <p>sono1199@hotmail.com
                <br>0468371798</p>
            </div>
            <div class="footer-col col-md-4">
              <h4>Desperate for Web Developing job</h4>
              <p>Please feel free to contact me anytime.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              Copyright &copy; Su Nier 2017
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top d-lg-none">
      <a class="btn btn-primary js-scroll-trigger" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="/laravel/vendor/jquery/jquery.min.js"></script>
    <script src="/laravel/vendor/popper/popper.min.js"></script>
    <script src="/laravel/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/laravel/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/laravel/js/freelancer.js"></script>
    @yield('js')
</body>
</html>