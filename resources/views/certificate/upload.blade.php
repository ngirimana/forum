@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header">{{ __('Add Certificate') }}</div>

            <div class="card-body">
                <form action="{{route('certificates.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Student Registration Number</label>
                        <input type="text" class="form-control" name="stud-id" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="full-name">Student Full Names</label>
                        <input type="text" class="form-control" name="full-name" value="" required>
                    </div>
                    <div class="form-group">
                        <input type="file" name="certificate_image" id="">
                    </div>
                    <input type="submit" class="btn btn-success" value="Upload Certificate">
                </form>
        </div>
        
    
</div>

@endsection

