<?php

use App\Models\Book;
use App\Models\Ebook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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

Route::resource('student', StudentController::class);
Route::resource('book',BookController::class);
Route::resource('category',CategoryController::class);
Route::resource('ebook', EbookController::class);
Route::resource('order', OrderController::class);
Route::get('/download-pdf/{ebook}', 'App\Http\Controllers\EbookController@show')->name('download.pdf');




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

    Route::get('profile-user',[ProfileController::class,'profile'])->name('profileUser');
Route::get('delete/user',[ProfileController::class,'deleteAccount'])->name('user.delete');
Route::get('security/user',[ProfileController::class,'security'])->name('user.security');
Route::post('update/profile',[ProfileController::class,'updateProfile'])->name('updateProfile');
Route::get('my-books',[ProfileController::class,'myBooks'])->name('myBooks');
Route::get('enroll-book/{book}',[ProfileController::class,'enrollBook'])->name('enrollBook');
Route::post('enroll-book/{book}',[ProfileController::class,'enrollBookPost'])->name('enrollBookPost');
Route::get('remove/book/{id}',[ProfileController::class,'removeMyBook'])->name('removeMyBook');
});
