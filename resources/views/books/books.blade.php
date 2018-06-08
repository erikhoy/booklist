@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>booj Book List Test</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Add New Book</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th width="80px">@sortablelink('title')</th>
                <th>@sortablelink('author')</th>
                <th>@sortablelink('publication_date')</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="sortable">
        @if($books->count())
            @foreach($books as $key => $book)
                <tr id="item_{{ $book->id }}">
                    <td>{{ Html::image('images/'.$book->image_url, $book->title.' - '.$book->author, array('class' => 'css-class', 'width' => 50)) }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publication_date }}</td>
                    <td>
                    <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {!! $books->appends(\Request::except('page'))->render() !!}
@endsection