<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class SearchBook extends Component
{
    public $search;
    public function render()
    {
        sleep(2);
        if($this->search !=  ''){
            return view('livewire.search-book',[
                'books' => Book::where('title','like','%'.$this->search.'%')->take(4)->get()
            ]);
         }
         else{
            return view('livewire.search-book');
         }
        
    }

}
