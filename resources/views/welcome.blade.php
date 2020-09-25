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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                   
                        @foreach ($channels as $channel)
                        <li class="nav-item">
                        <a href="{{route('discussions.index')}}?channel={{$channel->slug}}" class="nav-link">  {{$channel->name}}</a>
                        </li>
                    @endforeach
                 
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-4">
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide col-md-8" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('slide_images/1.jpg') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('slide_images/2.jpeg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('slide_images/3.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
              </div>
                <div class="col-md-4">
                    <span class="font-weight-bold " >Latest storries</span>
                    @foreach ($latestDiscussions as $latestDiscussion)
                    <a href="{{route('discussions.show',$latestDiscussion->slug)}}">
                        <div class="card mb-2 latest-story" ">
                       
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="card-image" src="{{ asset('images/user.jpg') }}" alt="First slide">
                                    </div>
                                    <div class="col-md-8">
                                        <small>{{$latestDiscussion->created_at}}</small>
                                        <p>{!!$latestDiscussion->title!!}</p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="row">
                @foreach ($discussions as $discussion)
                <div class="col-md-4 my-4">
                    <a href="{{route('discussions.show',$discussion->slug)}}">
                    <div class="card">
                        <div class="card-header">
                            <img class="discussion-card" src="{{ asset('images/user.jpg') }}" alt="First slide">
                        </div>
                        <div class="card-body">
                            <small>{{$discussion->created_at}}</small>
                            <p>{!!$discussion->title!!}</p> 
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
                {{$discussions->appends(['channel'=>request()->query('channel')])->links("pagination::bootstrap-4")}}
            </div>

            
        </main>
        
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    
   
    

</body>
</html>
