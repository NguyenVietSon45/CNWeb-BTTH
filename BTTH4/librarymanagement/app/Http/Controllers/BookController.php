<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(10);
        return view("books.index",compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'author'=>'required',
            'category'=>'required',
            'year'=>'required|date',
            'quantity'=>'required|numeric',
        ]);
        Book::create($request->all());
        return redirect()->route('books.store')->with('success','Sách được thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $books)
    {
        $request->validate([
            'name'=>'required',
            'author'=>'required',
            'category'=>'required',
            'year'=>'required|date',
            'quantity'=>'required|numeric',
        ]);

        $books ->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
