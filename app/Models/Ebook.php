<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ebook extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
