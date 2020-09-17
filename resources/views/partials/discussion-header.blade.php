<div class="card-header">
    <div class="d-flex justify-content-between">
       <div>Posted by <span class="font-weight-bold">  {{$discussion->user->name}}</span></div> 
    <div> <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-success btn-sms">View</a></div>
    </div>


</div>