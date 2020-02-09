@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card-body">
            <form  method="post" action="{{ route('blog.update', $blog->id) }}">
                @csrf
                @method('PATCH')
                <input class="form-control" name="user_id" value="{{Auth::user()->id}}" hidden>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Author Name</label>
                    <input class="form-control" name="user_name" value="{{Auth::user()->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title of Blog" value="{{ $blog->title }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="description" rows="3">{{ $blog->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection