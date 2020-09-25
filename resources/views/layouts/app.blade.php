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
                        <li class="nav-item">
                            <a href="/" class="nav-link"> Home</a>
                        </li>
                   
                        @foreach ($channels as $channel)
                        <li class="nav-item">
                        <a href="{{route('discussions.index')}}?channel={{$channel->slug}}" class="nav-link">  {{$channel->name}}</a>
                        </li>
                    @endforeach
                 
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
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    
   
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
       CKEDITOR.replace( 'summary-ckeditor', {
    filebrowserUploadUrl: "{{route('discussions.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>

</body>
</html>
