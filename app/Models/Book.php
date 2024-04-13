<?php

namespace App\Models;

use App\Models\Ebook;
use App\Models\Category;
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

    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'book_id');
    }

    public static function rating($id)
    {
        $student_review=0;
        $s=0;
        $rat1 = \App\Models\Review::where('book_id',$id)->where('rating','=','1')->get();
        $rat2 = \App\Models\Review::where('book_id',$id)->where('rating','=','2')->get();
        $rat3 = \App\Models\Review::where('book_id',$id)->where('rating','=','3')->get();
        $rat4 = \App\Models\Review::where('book_id',$id)->where('rating','=','4')->get();
        $rat5 = \App\Models\Review::where('book_id',$id)->where('rating','=','5')->get();
        $rat = \App\Models\Review::where('book_id',$id)->get();
        if($rat->count() == 0){    
            $student_review=0;
            $s=0;
        }
        else{
            $student_review = round((($rat1->count() * 1) + ($rat2->count() * 2) + ($rat3->count() * 3) + ($rat4->count() * 4) + ($rat5->count() * 5)) / $rat->count(),1);
            $s = $rat->count();
        }    
        return ['0' => $student_review,
                '1' => $s
               ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
