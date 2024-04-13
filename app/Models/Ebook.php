<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ebook extends Book
{
    use HasFactory;
    protected $fillables = ['book_id','path','type'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
