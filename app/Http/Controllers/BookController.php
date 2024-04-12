<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('book.book', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = Book::create([
            'title'=>$request->title,
            'author'=>$request->author,
            'quantity'=>$request->quantity,
            'description'=>$request->description,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
        ]);

        if($request->file('cover_path')){
            $request->validate([
                'cover_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
            $ext = $request->file('cover_path')->extension();
            $content = file_get_contents($request->file('cover_path'));
            $filename = str::random(10);
            $path = "CoverPhoto/.$filename.$ext";
            storage::disk('public')->put($path,$content);
            $book->update([
                'cover_path' =>$path
            ]);
        }
        return to_route('book.index')->with('message' , 'book added sucessufully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.book-single',[
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request ->all());
        
        if($request->file('cover_path')){
            $request->validate([
                'cover_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
            Storage::disk('public')->delete($book->cover_path);
            $ext = $request->file('cover_path')->extension();
            $content = file_get_contents($request->file('cover_path'));
            $filename = str::random(10);
            $path = "CoverPhoto/.$filename.$ext";
            storage::disk('public')->put($path,$content);
            $book->update([
                'cover_path' =>$path
            ]);

        }
        return redirect()->route('book.index')->with('message','Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return to_route('books.index')->with('message', 'Book deleted successfuly');
    }
}
