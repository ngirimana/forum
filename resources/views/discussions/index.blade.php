@extends('layouts.app')

@section('content')


@foreach ($discussions as $discussion)
    <div class="card mb-2">
        @include('partials.discussion-header')
        <div class="card-body ">
            {!!$discussion->title!!}
        </div>
    
</div>
    
@endforeach
<div class="" style="height: 100">{{$discussions->links("pagination::bootstrap-4")}}</div>

@endsection
