<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $readers = Reader::with("reader")->paginate(5);
        return view("readers.index",compact("reader"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("readers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'birthday'=>'required|date',
            'address'=>'required',
            'phone'=>'required|numeric',
        ]);
        Reader::create($request->all());
        return redirect()->route('readers.store')->with('success','Người đọc được thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reader $reader)
    {
        return view('readers.show', compact('reader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reader $reader)
    {
        return view('readers.edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reader $reader)
    {
         $request->validate([
            'name'=>'required',
            'birthday'=>'required|date',
            'address'=>'required',
            'phone'=>'required|numeric',
        ]);
        $reader::create($request->all());
        return redirect()->route('readers.update')->with('success','Người đọc được update thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reader $reader)
    {
        $reader->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
