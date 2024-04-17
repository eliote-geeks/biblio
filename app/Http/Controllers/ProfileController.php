<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Author;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile.profile');
    }

    public function deleteAccount()
    {
        return view('profile.delete');
    }

    public function security()
    {
        return view('profile.security');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'matricular'  => 'required',
            // 'birth' => 'required|date',
            'address' => 'required',
            'department' => 'required',
            'sexe' => 'required',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        // if(User::where('name',$user->name)->count() == 0 && User::where('') )
        $user->name = $request->name;
        $user->matricule = $request->matricular;
        $user->level = $request->level;
        $user->address = $request->address;
        $user->dept = $request->department;
        $user->sexe = $request->sexe;
        $user->save();
        return redirect()->back()->with('message','informations updated successfully !!');

    }

    public function myBooks()
    {

        $books = DB::table('books')
        ->leftJoin('orders','orders.book_id','=','books.id')
        ->selectRaw('books.*')
        ->where('orders.user_id','=',Auth::user()->id)
        ->where('orders.status','=','wait')
        ->get();

        $booksOK = DB::table('books')
        ->leftJoin('orders','orders.book_id','=','books.id')
        ->selectRaw('books.*, orders.date_take date_take, orders.date_back date_back')
        ->where('orders.user_id','=',Auth::user()->id)
        ->where('orders.status','=','received')
        ->get();
        return view('profile.my-books',compact('books','booksOK'));
    }

    public function enrollBook(Book $book)
    {
        return view('book.enroll',compact('book'));
    }

    public function enrollBookPost(Request $request, $book)
    {
        $request->validate([
            'dateTake' => 'required|date',
            'dateBack' => 'required|date|after:dateTake'
        ]);

        if(Order::where('user_id',auth()->user()->id)->where('book_id',$book)->count() == 0 ){
            $order = new Order();
            $order->book_id = $book;
            $order->user_id = auth()->user()->id;
            $order->date_take = $request->dateTake;
            $order->date_back = $request->dateBack;
            $order->status = 'wait';
            $order->save();
            return redirect()->route('myBooks');
        }
        else
            return redirect()->back()->with('message','no book allowed !!');
    }

    public function removeMyBook($id)
    {
        Order::where([
            'user_id' => auth()->user()->id,
            'book_id' => $id,
        ])->firstOrFail()->delete();
        return redirect()->back()->with('message','deleted !!');
    }
}
