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
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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

Route::get('/', function () {
    // $books = Book::all();
    // $ebooks = Ebook::all();
    // return view('welcome', compact([
    //     'books',
    //     'ebooks'
    // ]));

    return redirect('login');
});

Route::resource('student', StudentController::class);
Route::resource('book', BookController::class);
Route::resource('category', CategoryController::class);
Route::resource('ebook', EbookController::class);


Route::get('/download-pdf/{ebook}', 'App\Http\Controllers\EbookController@show')->name('download.pdf');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $chart_options = [
            'chart_title' => 'books by month',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Book',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line'
        ];
        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'orders by month',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'pie'
        ];
        $chart2 = new LaravelChart($chart_options);
        if (Auth::user()->user_type == 'App\Models\Admin')
            return view('dashboard', compact('chart1', 'chart2'));


        return redirect()->route('my-books');
    })->name('dashboard');

   Route::get('profile-user',[ProfileController::class,'profile'])->name('profileUser');
Route::get('delete/user',[ProfileController::class,'deleteAccount'])->name('user.delete');
Route::get('security/user',[ProfileController::class,'security'])->name('user.security');
Route::post('update/profile',[ProfileController::class,'updateProfile'])->name('updateProfile');
Route::get('my-books',[ProfileController::class,'myBooks'])->name('myBooks');
Route::get('enroll-book/{book}',[ProfileController::class,'enrollBook'])->name('enrollBook');
Route::post('enroll-book/{book}',[ProfileController::class,'enrollBookPost'])->name('enrollBookPost');
Route::get('remove/book/{id}',[ProfileController::class,'removeMyBook'])->name('removeMyBook');
Route::resource('order', OrderController::class);
Route::post('/order-accepted/{order}', [OrderController::class, 'accept'])->name('order.accept');
Route::post('/order-received/{order}', [OrderController::class, 'received'])->name('order.received');
});




// Route::get('profile-user',[ProfileController::class,'profile'])->name('profileUser');
// Route::get('delete/user',[ProfileController::class,'deleteAccount'])->name('user.delete');
// Route::get('security/user',[ProfileController::class,'security'])->name('user.security');
// Route::post('update/profile',[ProfileController::class,'updateProfile'])->name('updateProfile');
// Route::get('my-books',[ProfileController::class,'myBooks'])->name('myBooks');
// Route::get('enroll-book/{book}',[ProfileController::class,'enrollBook'])->name('enrollBook');
// Route::post('enroll-book/{book}',[ProfileController::class,'enrollBookPost'])->name('enrollBookPost');
// Route::get('remove/book/{id}',[ProfileController::class,'removeMyBook'])->name('removeMyBook');
// =======
//     Route::get('profile-user', [ProfileController::class, 'profile'])->name('profileUser');
//     Route::get('delete/user', [ProfileController::class, 'deleteAccount'])->name('user.delete');
//     Route::get('security/user', [ProfileController::class, 'security'])->name('user.security');
//     Route::post('update/profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
//     Route::get('my-books', [ProfileController::class, 'myBooks'])->name('myBooks');
// });
