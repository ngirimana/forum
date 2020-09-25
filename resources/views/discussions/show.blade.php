@extends('layouts.app')

@section('content')


<div class="card ">
  @include('partials.discussion-header')
    <div class="card-body ">
        {{$discussion->title}}
        <hr>
        {!!$discussion->content!!}
    </div>

</div>
@foreach ($discussion->replies()->paginate(3) as $reply)
    <div class="card my-2">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <div>
            {{ $reply->reply_owner}}
          </div>
        </div>
      </div>
      <div class="card-body">
        {!!$reply->content!!}
      </div>
    </div>
 
@endforeach
{{   $discussion->replies()->paginate(3)->links("pagination::bootstrap-4")}}
<div class="card my-5">
  <div class="card-header">
    Add  comment
  </div>
  <div class="card-body">
  <form action="{{route('replies.store',$discussion->slug)}}" method="post"  >
      @csrf
      <div class="form-group">
        <label for="title">Full Name</label>
        <input type="text" class="form-control" name="full_name" value="" required>
    </div>
    <div class="form-group">
      <label for="title">Email/Phone Number</label>
      <input type="text" class="form-control" name="contact" value="" >
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" id="summary-ckeditor" name="content"></textarea>
    </div>
    <input type="submit" class="btn btn-sm btn-success" value="Add Comment">
    </form>
  </div>
</div>
@endsection
