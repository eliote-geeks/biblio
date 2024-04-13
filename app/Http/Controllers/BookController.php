<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $relates = Book::inRandomOrder()->where('category_id',$book->category->id)->where('id','!=',$book->id)->get()->take(8);            

        $rat1 = Review::where('book_id',$book->id)->where('rating','=','1')->get();
        $rat2 = Review::where('book_id',$book->id)->where('rating','=','2')->get();
        $rat3 = Review::where('book_id',$book->id)->where('rating','=','3')->get();
        $rat4 = Review::where('book_id',$book->id)->where('rating','=','4')->get();
        $rat5 = Review::where('book_id',$book->id)->where('rating','=','5')->get();
        $rat = Review::where('book_id',$book->id)->get();


        if($rat->count() == 0){
            $student_review=0;
            $s=0;
        }
        else{
            $student_review = round((($rat1->count() * 1) + ($rat2->count() * 2) + ($rat3->count() * 3) + ($rat4->count() * 4) + ($rat5->count() * 5)) / $rat->count(),1);
            $s = $rat->count();
        }
        
        
        if($rat1->count() > 0)
            $star1 = round(($rat1->count() * 100) / $rat->count(),0);
        else
            $star1 = 0;
        
        if($rat2->count() > 0)
            $star2 = round(($rat2->count() * 100) / $rat->count(),0);
        else
            $star2 = 0;
        
        if($rat3->count() > 0)
            $star3 = round(($rat3->count() * 100) / $rat->count(),0);
        else
            $star3 = 0;
        
        if($rat4->count() > 0)            
            $star4 = round(($rat4->count() * 100) / $rat->count(),0);
        else
            $star4 = 0;
        
        if($rat5->count() > 0)
            $star5 = round(($rat5->count() * 100) / $rat->count(),0);
        else
            $star5 = 0;

        return view('book.book-single',[
            'book' => $book,
            'star1' => $star1,
            'star2' => $star2,
            'star3' => $star3,
            'star4' => $star4,
            'star5' => $star5,
            'student_review' => $student_review,
            's' => $s,
            'relates' => $relates,
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
        return to_route('book.index')->with('message', 'Book deleted successfuly');
    }
}
