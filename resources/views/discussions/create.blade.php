@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header">{{ __('Add Discussion') }}</div>

            <div class="card-body">
                <form action="{{route('discussions.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="summary-ckeditor" name="content"></textarea>
                        
                    </div>
                    <div class="form-group">
                        <label for="contact">Channel</label>
                        <select name="channel" id="channel" class="form-control">
                            @foreach ($channels as $channel)
                        <option value="{{$channel->id}}" name="channel">{{$channel->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="cover_image" id="">
                    </div>
                    <input type="submit" class="btn btn-success" value="Create Discussion">
                </form>
        </div>
        
    
</div>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
       CKEDITOR.replace( 'summary-ckeditor', {
    filebrowserUploadUrl: "{{route('discussions.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
       });</script>
@endsection

