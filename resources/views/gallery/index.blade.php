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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    
    
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
           
            @if(count($galleryImages)>=1)
           
            <div class="row">
                @foreach ($galleryImages as $galleryImage)
                <div class="col-md-4 mb-2 ">
                    <div class="card">
                        <div class="card-body">
                            <img class="" src="{{ asset('gallery_images/'.$galleryImage->image) }}" alt="" style="width:100%">
                        </div>
                    </div>
                   
                </div>
                
                
            
            @endforeach
            @else
             <p>No images In gallery</p>
            @endif

            
        </main>
        <footer >
            <div class="container">
                <div class="row my-4">
                    <div class="col-md-6">
                        <div class="card"> 
                            <div class="card-header">Location</div>
                            <div class="card-body card-body-cascade text-center">
                                <!--Google map-->
                                <div id="map-container-google-8" class="z-depth-1-half map-container-5" style="height: 300px">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2570.661289154739!2d30.101052635985546!3d-1.966796629864029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca65025fefa7f%3A0x62c2f348e1b93617!2sUniversity%20of%20Tourism%2C%20Technology%20and%20Business%20Studies%20(UTB)!5e0!3m2!1sen!2srw!4v1601039313614!5m2!1sen!2srw" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card"> 
                            <div class="card-header">Contact us</div>
                            <div class="card-body card-body-cascade text-center">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="title" value="" placeholder="Enter your Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" value=""  placeholder="Enter Email" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" cols="10" rows="6" name="content" placeholder="Enter Your Message"></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Send Message">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-us">
            <section  class=" container ">
                <div class="row   contact-us ">
                   <div class="col-md-4 my-4">
                       <i class="fa fa-map-marker fa-3x d-flex justify-content-center  my-4" aria-hidden="true"></i>
                      <p class="d-flex justify-content-center">
                          KN 7 Ave ,Kigali Rwanda
                       </p>
                       </div>
                       <div class="col-md-4 my-4">
                           <i class="fas fa-phone fa-3x d-flex justify-content-center  my-4"></i>
                          
                           <p class="d-flex justify-content-center">
                               +250781475108
                           </p>
                       </div>
                       <div class="col-md-4 my-4">
                           <i class="fas fa-envelope fa-3x  d-flex justify-content-center  my-4"></i>
                           
                           <p class="d-flex justify-content-center">
                               info@kuranga.co
                           </p>
                       </div>    
                </div>
            </section>
            </div>
     
            <div class="d-flex justify-content-center copy-right"> <h3>  Kuranga &copy 2020</h3> </div>
            
        </footer>
        
    </div>
    <script src="https://kit.fontawesome.com/1ae30b6763.js"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
    
   
    

</body>
</html>