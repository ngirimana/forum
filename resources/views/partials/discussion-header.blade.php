<div class="card-header">
    <div class="d-flex justify-content-between">
       <div>Posted by <span class="font-weight-bold">  {{$discussion->user->name}}</span></div> 
    <div>
        <p><span class="font-weight-bold">posted at</span> {{$discussion->created_at}}</p>
    </div>
    <div> <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-success btn-sms">View</a></div>
    @auth
    <div> <a href="{{route('discussions.edit',$discussion->slug)}}" class="btn btn-success btn-sms">Edit</a></div>
    <div> <form method="POST" action="{{ route('discussions.destroy',$discussion->slug)}}" >
        @csrf
        {{ method_field('DELETE') }}
        <button type="submit"class="btn btn-success btn-sms btn-danger">Delete</button>
    </form></div>
    @endauth
    </div>


</div>
