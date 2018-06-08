<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 - Column sorting with pagination example from scratch</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <h3 class="text-center">Laravel 5 - Column sorting with pagination example from scratch</h3>
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