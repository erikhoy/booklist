<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Html;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::sortable()->orderBy('priority', 'asc')->paginate(5);
        return view('books/books',compact('books'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $last = DB::table('books')->orderBy('priority', 'DESC')->first();
        $priority = $last->priority;
        return view('books.create', compact('priority'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        $input = $request->all();
        if($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image_url'] = $name;
        }

        Book::create($input);

        return redirect()->route('books.index')
                        ->with('success','Book added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Book::findOrFail($id);
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::findOrFail($id);
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
                        ->with('success','Book updated successfully');
    }

    /**
     * Reorder the priority level in database
     *
     */
    public function reorder(Request $request) {
        $i = 0;
        foreach($_POST['item'] as $value) {
            $book = Book::findOrFail($value);
            $book->update(['priority'=>$i]);
            $i++;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')
                        ->with('success','Book deleted successfully');
    }
}
