@extends('layouts.app')

@section('content')
<div class="float-right"><a class="btn btn-primary" href="{{ route('blog.create') }}" role="button" style="margin-right: 4px;">Add Blog</a></div>
<a class="btn btn-info" href="{{ URL::previous() }}" role="button">Go Back</a>
<div class="table-responsive py-4">
    @if (Session::get('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    <table class="table table-flus" id="datatable-basic">
        <thead class="thead-light">
            <tr>
                <th>Sr No</th>
                <th >Author Name</th>
                <th >Blog Titile</th>
                <th >Blog Description</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody class="list">
        @foreach($blogs as $blog)
            <tr>
                <td>{!! $loop->iteration !!}</td>
                <td>{!!  $blog->get_users->name !!}</td>
                <td >{!! $blog->title !!}</td>
                <td >{!! $blog->description !!}</td>                        
                <td > 
                    <a class="btn btn-warning" href="{{ route('blog.edit', $blog->id) }}" style="margin-bottom: 4px;">Edit</a>
                    <form action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <!-- <a href="{{ route('blog.destroy', $blog->id) }}">Delete</a> -->
                </td>
            </tr>
        @endforeach                              
        </tbody>
    </table>
</div>
@endsection