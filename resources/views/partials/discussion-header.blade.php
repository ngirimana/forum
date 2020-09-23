<div class="card-header">
    <div class="d-flex justify-content-between">
       <div>Posted by <span class="font-weight-bold">  {{$discussion->user->name}}</span></div> 
    <div> <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-success btn-sms">View</a></div>
    @auth
    <div> <a href="{{route('discussions.edit',$discussion->slug)}}" class="btn btn-success btn-sms">edit</a></div>
    <div> <form method="POST" action="{{ route('discussions.destroy',$discussion->slug)}}" >
        @csrf
        {{ method_field('DELETE') }}
        <button type="submit"class="btn btn-success btn-sms btn-danger">Submit</button>
    </form></div>
    @endauth
    </div>


</div>
