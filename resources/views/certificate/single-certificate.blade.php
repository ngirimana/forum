<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Forum') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet">
    
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm navigator">
            <div class="container">
                <a class="navbar-brand navigator" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item "> <a href="/" class="nav-link navigator">Home</a></li>
                        <li class="nav-item "> <a href="http://kuranga.co/" class="nav-link navigator">Website</a></li>
                        @foreach ($channels as $channel)
                        <li class="nav-item ">
                        <a href="{{route('discussions.index')}}?channel={{$channel->slug}}" class="nav-link navigator">  {{$channel->name}}</a>
                        </li>
                        
                    @endforeach
                    <li class="nav-item ">
                        <a href="{{route('gallery.create')}}" class="nav-link navigator"> Gallery</a>
                    </li>
                    
                    
                    @auth
                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle navigator" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endauth
                 
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container py-4">
          <div class="photo-gallery">
              <div class="container">
                <div class="card ">
                  <span class="text-margin"><h3 class="font-weight-normal">Student Registration Number: {{$certificate->stud_id}}</h3></span>
                  <span class="text-margin" style="margin-top: 0px"><h3 class="font-weight-normal" >Student Names: {{$certificate->full_name}}</h3></span>
                  <div class="card-body" style="width: ">
                    <a href="{{ asset('certificate_images/'.$certificate->certificate_image) }}" data-lightbox="photos">
                      <img class="img-fluid" src="{{ asset('certificate_images/'.$certificate->certificate_image) }}">
                  </div>
                </div>
              </div>
          </div>
        </main>
        <script src="https://kit.fontawesome.com/1ae30b6763.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    
        <script>
        $(this).ekkoLightbox({
                    alwaysShowClose: true,
                    onShown: function() {
                        console.log('Checking our the events huh?');
                    },
                    onNavigate: function(direction, itemIndex)
                        console.log('Navigating '+direction+'. Current item: '+itemIndex);
                    }
                    
                });
        </script>
        <script src="{{ asset('js/app.js') }}" ></script>
        
       
        
    
    </body>
    </html>
    


