<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
// <<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
// =======
use Illuminate\Database\Eloquent\Relations\HasMany;
// >>>>>>> e53c6f7d775c9d2489c96154698affd13992f63e

class Category extends Model
{
    use HasFactory;
    // <<<<<<< HEAD

    // public function book()
    // {
    //     return $this->hasMany(Book::class);
    // }

    // =======
    protected $fillable =['name'];

    public function book(): HasMany
    {
        return $this->hasMany(Category::class);
        // >>>>>>> e53c6f7d775c9d2489c96154698affd13992f63e
    }
}
