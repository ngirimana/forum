@extends('layouts.app')

@section('content')

@if(count($discussions)>=1)
    @foreach ($discussions as $discussion)
        <div class="card mb-2">
            @include('partials.discussion-header')
            <div class="card-body ">
                <div class="row">
                <div class="col-md-4">
                    <img class="" src="{{ asset('cover_images/'.$discussion->cover_image) }}" style="width:100%" alt="">
                </div>
                  <div class="col-md-8"> {!!$discussion->title!!}</div>
                </div>
            </div>
    
        </div>
    @endforeach
    {{$discussions->appends(['channel'=>request()->query('channel')])->links("pagination::bootstrap-4")}}
@else
    <p class="label-info">No Discussions Found!</p>
    @endif
@endsection
