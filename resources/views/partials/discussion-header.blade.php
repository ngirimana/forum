<div class="card-header">
    <div class="d-flex justify-content-between">
       <div>Posted by <span class="font-weight-bold">  {{$discussion->user->name}}</span></div> 
    <div> <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-success btn-sms">View</a></div>
    @auth
    <div> <a href="{{route('discussions.edit',$discussion->slug)}}" class="btn btn-success btn-sms">edit</a></div>
    <div> <a href="" class="btn btn-success btn-sms btn-danger">delete</a></div>
    @endauth
    </div>


</div>
