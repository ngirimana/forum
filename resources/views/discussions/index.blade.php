@extends('layouts.app')

@section('content')


@foreach ($discussions as $discussion)
    <div class="card mb-2">
        <div class="card-header">{{ $discussion->title }}</div>

        <div class="card-body ">
            {!!$discussion->content!!}
        </div>
    
</div>
    
@endforeach
<div class="" style="height: 100">{{$discussions->links("pagination::bootstrap-4")}}</div>

@endsection
