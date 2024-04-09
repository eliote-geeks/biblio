<?php

use App\Models\Book;
use App\Models\Ebook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvdider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    $books = Book::all();
    $ebooks = Ebook::all();
    return view('welcome',compact([
        'books',
        'ebooks'
    ]));
});


Route::resource('book',BookController::class);
Route::resource('category',CategoryController::class);

Route::get('profile-user',[ProfileController::class,'profile'])->name('profileUser');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::user()->user_type == 'App\Models\Admin')
            return view('dashboard');
        return redirect()->route('profileUser');
    })->name('dashboard');
});
