@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2> Upload Gallery Image</h2>
        </div>
        <div class="card-body">
            <form action="{{route('gallery.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="image[]" class="form-control-image" multiple>
                    </div>
                    <input type="submit" value="Upload" class="btn btn-success">
            </form>
        </div>
    </div>
</div>

@endsection
