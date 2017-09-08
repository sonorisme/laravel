@extends('layouts.app')
@section('content')
<!-- Header -->
<header class="masthead">
  <div class="container">
    <img class="img-fluid" src="img/profile.png" alt="">
    <div class="intro-text">
      <span class="name">Welcome</span>
      <hr class="star-light">
      <span class="skills">Demo blog site using laravel for backend</span>
    </div>
  </div>
  </header>

  <!-- Portfolio Grid Section -->
  <section id="portfolio">
  <div class="container">
    <h2 class="text-center">Recent Posts</h2>
    <hr class="star-primary">
    <div class="row">


    @foreach($posts as $post)

      <div class="col-sm-4 portfolio-item">
        <a class="portfolio-link" href="{{url('blog/'.$post->slug)}}">
          <div class="caption">
            <div class="caption-content">
              <i class="fa fa-search-plus fa-3x"></i>
            </div>
          </div>
          <h3>{{$post->title}}</h3>
          <p>{{$post->body}}</p>
        </a>
      </div>
    @endforeach
    </div>

  </div>
  </section>

  <!-- About Section -->
  <section class="success" id="about">
  <div class="container">
    <h2 class="text-center">About</h2>
    <hr class="star-light">
    <div class="row">
      <div class="col-lg-8 ml-auto mr-auto">
        <p>Graduated from University of Wollongong with Distinction. Passionate for learning various new technologies. Always keen and quick to learn. Diligent at work. Team player.
        </p>
      </div>
    </div>
  </div>
  </section>

  <!-- Contact Section -->
  <section id="contact">
  <div class="container">
    <h2 class="text-center">Contact Me</h2>
    <hr class="star-primary">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
       
      </div>
    </div>
  </div>
</section>
@endsection


