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
    <link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet">
    
    
</head>
<body>
    <div id="app">
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
                            <a href="{{route('gallery.index')}}" class="nav-link navigator"> Gallery</a>
                        </li>
                        @auth
                        <li class="nav-item ">
                            <a href="{{route('certificates.index')}}" class="nav-link navigator"> Certificates</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle navigator" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
        
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               
                                <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
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
        @if(!in_array(request()->path(),['login','register','password/email','password/reset']))
        <main class="container py-4">
            <div class="row">
                <div class="col-md-4">
                    @auth
                <a href="{{route('discussions.create')}}" style="width:100%; color:white;" class="btn btn-info my-2"> Add Discussion</a>
                <a href="{{route('gallery.create')}}" style="width:100%; color:white;" class="btn btn-info my-2"> Add Gallery</a>
                <a href="{{route('certificates.create')}}" style="width:100%; color:white;" class="btn btn-info my-2"> Add Certificate</a>
           
                @endauth

                    <div class="card">
                        <div class="card-header">
                            Channels
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($channels as $channel)
                                    <li class="list-group-item ">
                                    <a href="{{route('discussions.index')}}?channel={{$channel->slug}}">  {{$channel->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                        
                </div>
            <div class="col-md-8">
                @yield('content')
            </div>
            </div>
        </main>
        @else
            <main class="py-4">
                @yield('content')
            </main>
        @endif
        <footer class="my-4">
            <div class="container my-4">
                <div class="row my-4">
                    <div class="col-md-6 my-4">
                        <div class="card"> 
                            <div class="card-header">Location on map</div>
                            <div class="card-body card-body-cascade text-center">

                                <!--Google map-->
                                <div id="map-container-google-8" class="z-depth-1-half map-container-5" style="height: 300px">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2570.661289154739!2d30.101052635985546!3d-1.966796629864029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca65025fefa7f%3A0x62c2f348e1b93617!2sUniversity%20of%20Tourism%2C%20Technology%20and%20Business%20Studies%20(UTB)!5e0!3m2!1sen!2srw!4v1601039313614!5m2!1sen!2srw" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                        
                              </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 my-4">
                        <div class="card"> 
                            <div class="card-header">Contact us</div>
                            <div class="card-body card-body-cascade text-center">
                                @if($message=Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button"class="close" data-dismis="alert">X</button>
                                    <strong>{{$message}}</strong>
                                    </div>
                                @endif
                                <form action="{{route('send-email')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" value="" placeholder="Enter your Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" value=""  placeholder="Enter Email" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" cols="10" rows="6" name="message" placeholder="Enter Your Message" required></textarea>
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
                    <div class="row my-4  contact-us mx-auto">
                        <div class="col-md-4 d-flex justify-content-center">
                            <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                            <p class="contact-text">
                            KK 19 ave ,Kigali Rwanda
                            </p>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <i class="fas fa-phone fa-2x "></i>
                            <span class="contact-text">
                                +250781475108
                            </span>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <i class="fas fa-envelope fa-2x"></i>
                            <span class="contact-text">
                                info@kuranga.co
                            </span>
                        </div>    
                    </div>
                </section>
            </div>
             
                    <div class="d-flex justify-content-center copy-right"> <h3>  Kuranga &copy 2020</h3> </div>
            
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    
    <script src="https://kit.fontawesome.com/1ae30b6763.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
       CKEDITOR.replace( 'summary-ckeditor', {
    filebrowserUploadUrl: "{{route('discussions.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
<script src="{{ asset('js/lightbox.min.js') }}" ></script>
</script>

</body>
</html>
