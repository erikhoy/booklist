<!DOCTYPE html>
<html>
<head>
	<title>booj Code Test</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="../../images/favicon.png">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script>
	  	$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
  		
		$(function () {
			$( "#sortable" ).sortable({
				axis: 'y',
				update: function (event, ui) {
					var data = $(this).sortable('serialize');
					$.ajax({
						data: data,
						type: 'POST',
						url: 'books/reorder'
					});
				}
			});
			$( "#sortable" ).disableSelection();
		});
	</script>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>booj Book List Test</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.index') }}"> Add New Book</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="80px">@sortablelink('title')</th>
            <th>@sortablelink('author')</th>
            <th>@sortablelink('publication_date')</th>
        </tr>
        @if($books->count())
            @foreach($books as $key => $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publication_date }}</td>
                </tr>
            @endforeach
        @endif
    </table>
    {!! $books->appends(\Request::except('page'))->render() !!}
</div>


</body>


</html>