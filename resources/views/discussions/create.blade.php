@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header">{{ __('Add Discussion') }}</div>

            <div class="card-body">
                <form action="{{route('discussion.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" value="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="contact">Channel</label>
                        <select name="channel" id="channel" class="form-control">
                            @foreach ($channels as $channel)
                        <option value="{{$channel->id}}">{{$channel->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success">Create Discussion</button>
                </form>
        </div>
    
</div>
@endsection
