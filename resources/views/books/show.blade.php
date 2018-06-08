@extends('books.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> View Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
    	<div class="col-xs-12 col-md-offset-2 col-md-4">
    		@if(empty($book->image_url)) 
    			<img src="images/placeholder.jpg">
    		@else
    			<img src="../images/{{ $book->image_url }}" alt="{{ $book->title }}.' - '.{{ $book->author }}" width="100%">
    		@endif
    	</div>
    	<div class="col-xs-12 col-md-4">
	        <div class="form-group">
                <strong>Title:</strong>
	           {{ $book->title }}
	        </div>
	        <div class="form-group">
                <strong>Author:</strong>
                {{ $book->author }}
	        </div>
	        <div class="form-group">
	            <strong>Publication Date:</strong>
	            {{ $book->publication_date }}
	            </div>
	        </div>
        </div>
@endsection