<?php

namespace App\Models;

use App\Models\Ebook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    public function ebook()
    {
        return $this->HasOne(Ebook::class);
    }
}
