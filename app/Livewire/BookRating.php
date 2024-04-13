<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use App\Models\Response;
use App\Models\LikeReview;
use Livewire\WithPagination;

class BookRating extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'reviewSectionRefresh' => '$refresh',
    ];
    
    public $limit = 2;
    public $rating = 1;
    public $review;
    public $content;
    public $book;
    public $rat;
    public $hideForm = true;

    public function OrderRating()
    {
        $id = $this->rat;
        // $this->reviews = Review::latest()->take(4)->where('book_id',$this->book->id)->where('rating',$id)->get();
             
    }

    public function delete($id)
    {
        $delete = Review::findOrFail($id);
        $delete->delete();
        $this->dispatch('reviewSectionRefresh');
        session()->flash('message','deleted success!!!');
    }

    public function more($id)
    {
        $this->limit += 2;
    }

    public function save()
    {
        $this->validate([
            'review' => 'required|max:90|min:3',
            'rating' => 'required'
        ]);
        $rev = Review::where('book_id',$this->book->id)->get();
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->book_id = $this->book->id;
        $review->rating = $this->rating;
        $review->review = $this->review;
        $review->save();
    
        $this->reset(['rating','review']);
        $this->dispatch('reviewSectionRefresh');
        session()->flash('message','success rated');
        
    }

    public function response($id)
    {
        $this->validate([
            'content' => 'required|max:1300',        
        ]);
        $review = Review::find($id);

        $response = new Response();
        $response->author_id = auth()->user()->id;
        $response->client_id = $review->user->id;
        $response->book_id = $this->book->id;
        $response->content = $this->content;
        $response->comment_id = $review->id;
        $response->comment_type = 'App\Models\Response';
        $response->save();


        $this->dispatch('reviewSectionRefresh');
        $this->reset('content');
        session()->flash('message','success rated');
    }


    public function deleteResponse($id)
    {
        $response = Response::findOrFail($id);        
        $response->delete();
        $this->dispatch('reviewSectionRefresh');
        session()->flash('message','success removed comment');
    }

    public function like($id)
    {
        $review = Review::findOrFail($id);        
        if(LikeReview::where([
            'review_type' => 'App\Models\Review',            
            'user_id' => auth()->user()->id,
            'review_id' => $review->id,
            'status' => 1
        ])->count() == 0){

            if(LikeReview::where([
                'review_type' => 'App\Models\Review',            
                'user_id' => auth()->user()->id,
                'review_id' => $review->id
            ])->count() == 0){
                
                $like = new LikeReview();
                $like->user_id = auth()->user()->id;
                $like->review_type = 'App\Models\Review';
                $like->review_id = $review->id;
                $like->status = 1;
                $like->save();                   
            }
        }
        else{            
            $like = LikeReview::where([
                'review_type' => 'App\Models\Review',            
                'user_id' => auth()->user()->id,
                'review_id' => $review->id,
                'status' => 1
            ])->first()->delete();         
        }
    }
    
    public function dislike($id)
    {        
        $review = Review::findOrFail($id);        
        if(LikeReview::where([
            'review_type' => 'App\Models\Review',
            'user_id' => auth()->user()->id,
            'review_id' => $review->id,
            'status' => 0
        ])->count() == 0){
            if(LikeReview::where([
                'review_type' => 'App\Models\Review',            
                'user_id' => auth()->user()->id,
                'review_id' => $review->id
            ])->count() == 0){
                $like = new LikeReview();
                $like->user_id = auth()->user()->id;
                $like->review_type = 'App\Models\Review';
                $like->review_id = $review->id;
                $like->status = 0;
                $like->save();
            }
        }
        else{            
            $like = LikeReview::where([
                'review_type' => 'App\Models\Review',            
                'user_id' => auth()->user()->id,
                'review_id' => $review->id,
                'status' => 0
            ])->first()->delete();
        }
    }

    public function render()
    {
        $verified = Review::where('book_id',$this->book->id)->where('user_id',auth()->user()->id)->get();
        if($verified->count() > 0)
            $this->hideForm = false;        
                
        return view('livewire.book-rating',[
            'reviews' => Review::latest()->where('book_id',$this->book->id)->paginate(4),
        ]);
    }

}
