<?php

namespace App\Http\Controllers;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::with("borrow")->paginate(5);
        return view("borrows.index",compact("borrow"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("borrows.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reader_id'=>'required',
            'book_id'=>'required',
            'borrow_date'=>'required|date',
            'return_date'=>'required|date',
            'status'=>'required',
        ]);
        Borrow::create($request->all());
        return redirect()->route('borrows.store')->with('success','Sách cho mượn được thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {
        return view('borrows.show', compact('borrow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        return view('borrows.edit', compact('borrow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $borrow)
    {
        $request->validate([
            'reader_id'=>'required',
            'book_id'=>'required',
            'borrow_date'=>'required|date',
            'return_date'=>'required|date',
            'status'=>'required',
        ]);
        $borrow::create($request->all());
        return redirect()->route('borrows.update')->with('success','Người mượn được thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        $borrow->delete();

        return redirect()->route('borrows.delete')->with('success', 'Book deleted successfully.');
    }
}
