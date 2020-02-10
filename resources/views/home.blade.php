@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                    <!-- <div class="float-right"><a class="btn btn-primary" href="{{ route('blog.create') }}" role="button">Add Blog</a></div> -->
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <div class="float-right"><a class="btn btn-primary" href="{{ route('blog.create') }}">Add Blog</a></div> 
                    <div ><a class="btn btn-info" href="{{ route('blog.index') }}" role="button">See Your Blog</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
