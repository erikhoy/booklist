@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

         <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <label for="title">Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title" autofocus="autofocus">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <label for="author">Author:</strong>
                    <input class="form-control" name="author" placeholder="Author">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <label for="publication_date">Publication Date:</strong>
                    <input class="form-control" name="publication_date" placeholder="Year">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <label for="image">Image:</strong>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="priority" value="{{ $priority + 1 }}" placeholder="Year">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection