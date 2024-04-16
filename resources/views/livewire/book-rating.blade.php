<div>
    <!-- Card --><br><br><br><br>
    <div class="card mb-2">
        <!-- Card Header -->
        <div class="card-header d-lg-flex align-items-center justify-content-between">
            <div class="mb-3 mb-lg-0">
                <h3 class="mb-0">Reviews</h3>
                <span>You have full control to manage your own account
                    setting.</span>
            </div>
        </div>
        <!-- Card Body -->

        <div class="card-body ">

            <!-- List Group -->
            <ul class="list-group list-group-flush border-top">
                <!-- List Group Item -->
                @forelse($reviews as $review)
                    <li class="list-group-item px-0 py-4">
                        <div class="d-flex" style="margin-top:-20px;">
                            <a href="javascript:;">
                                <img src="{{ $review->user->profile_photo_url }}" alt=""
                                    class="rounded-circle avatar-lg" />
                            </a>
                            <div class="ms-1 mt-1">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <a href="javascript:;">
                                            <h4 class="mb-0"><b> {{ $review->user->name }}
                                        </a>
                                        @if ($review->user->user_type == 'App\Models\Admin')
                                            <i class="text-warning fa fa-star"></i>
                                        @endif
                                        </b></h4>
                                        <span class="text-muted fs-6">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div class="mt-2">
                                    <span class="me-1">
                                        @for ($i = 1; $i <= $review->rating; $i++)
                                            <i class="mdi mdi-star me-n1 mb-2 text-warning fs-6"></i>
                                        @endfor
                                        @for ($i = 1; $i <= 5 - $review->rating; $i++)
                                            <i class="mdi mdi-star me-n1 text-light"></i>
                                        @endfor

                                    </span>
                                    <span class="me-1">for</span>
                                    <span class="h5">{{ $review->book->title }}</span>
                                    <p class="mt-2 lh-sm">
                                        {{ $review->review }}.
                                    </p>
                                    @auth
                                        <div>
                                            <span></span>
                                        </div>
                                        <div class="d-lg-flex">
                                            <p class="mb-0">Was this review helpful?</p>
                                            <button wire:loading.attr='disabled'
                                                @if ($review->user_id != auth()->user()->id) wire:click='like({{ $review->id }})' @else disabled @endif
                                                class="btn btn-xs btn-dark ms-lg-3"><i class="fa fa-thumbs-up"></i>
                                                <small>({{ \App\Models\LikeReview::where('review_id', $review->id)->where('status', 1)->where('review_type', 'App\Models\Review')->count() }})</small></button>
                                            </i>
                                            <button wire:loading.attr='disabled'
                                                @if ($review->user_id != auth()->user()->id) wire:click='dislike({{ $review->id }})' @endif
                                                class="btn btn-xs btn-outline-white ms-1"><i class="fa fa-thumbs-down"></i>
                                                <small>({{ \App\Models\LikeReview::where('review_id', $review->id)->where('status', 0)->where('review_type', 'App\Models\Review')->count() }})</small></button>
                                        </div>

                                        <ul class="list-group list-group-flush collapse"
                                            id="collapseExample{{ $review->id }}">

                                            @forelse(\App\Models\Response::where('book_id',$this->book->id)->where('comment_type','App\Models\Response')->where('comment_id',$review->id)->get() as $response)
                                                <li class="list-group-item"><img class="rounded-circle avatar-sm"
                                                        src="{{ $response->author->profile_photo_url }}">
                                                    <span>{{ $response->author->name }}
                                                        @if ($response->author->user_type == 'App\Models\Admin')
                                                            <i class="fa fa-star text-warning"></i>
                                                        @endif
                                                        {{ $response->created_at->diffForHumans() }}
                                                    </span>

                                                    <p class="lh-sm">{{ $response->content }}. </p>
                                                    @if ($response->author->name == auth()->user()->name)
                                                        <a class="text-danger" href="javascript:;"
                                                            wire:loading.attr='disabled' wire:loading.class="text-success"
                                                            wire:click='deleteResponse({{ $response->id }})'><i
                                                                class=" fe fe-trash"></i></a>
                                                    @endif
                                                </li>



                                            @empty
                                            @endforelse
                                        </ul>
 
                                        <br>
                                        <button title="reply" wire:loadind.attr='disabled' type="button"
                                            class="btn btn-outline-white btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter{{ $review->user->id }}">reply
                                        </button>
                                        @if (\App\Models\Response::where('book_id', $this->book->id)->where('comment_type', 'App\Models\Response')->where('comment_id', $review->id)->count() > 0)
                                            <button title="show reponses" wire:loadind.attr='disabled' type="button"
                                                class="btn btn-outline-white btn-sm" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseExample{{ $review->id }}" aria-expanded="false"
                                                aria-controls="collapseExample{{ $review->id }}">
                                               <small>view responses</small>
                                            </button>
                                        @endif

                                        @if ($review->user_id == auth()->user()->id)
                                            <button title="delete review {{ $review->title }}" wire:loadind.attr='disabled'
                                                type="button" class="btn btn-outline-danger btn-sm"
                                                wire:click='delete({{ $review->id }})'><i
                                                    class="fe fe-trash"></i></button>
                                        @endif
                                        @if ($review->user_id != auth()->user()->id)
                                            <button wire:click='report({{ $review->id }})' wire:loadind.attr='disabled'
                                                type="button" class="btn btn-outline-danger btn-sm" title="Report Abuse"><i
                                                    class="fe fe-flag"></i></button>
                                        @endif

                                        
                                        <div class="modal fade" id="exampleModalCenter{{ $review->user->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">What would you
                                                            say to {{ $review->user->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input wire:model.defer='content' text="text"
                                                            placeholder="post your respond" class='form-control'>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button wire:click='response({{ $review->id }})' type="button"
                                                            data-bs-dismiss="modal" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                       
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                        <span>No review for this book!! </span>
                @endforelse
            </ul>

                {{ $reviews->links() }}

                <br>
                @auth
                    @if ($hideForm == true)
                        <h6 class="texte-center title">Build Amazing rate</h6> <br>
                        <form onsubmit="return false">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Rate This book</label>
                                <select class="form-select" id="inputGroupSelect01" wire:model.defer='rating'>
                                    <option selected>Choose...</option>
                                    <option value="1">★☆☆☆☆ (1/5)</option>
                                    <option value="2">★★☆☆☆ (2/5)</option>
                                    <option value="3">★★★☆☆ (3/5)</option>
                                    <option value="4">★★★★☆ (4/5)</option>
                                    <option value="5">★★★★★ (5/5)</option>

                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" wire:model.defer='review'
                                    placeholder="Recipient's review" aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" wire:loading.attr='hidden'
                                    wire:click.prevent='save' id="button-addon2">Comment</button>
                                <button wire:loading class="btn btn-dark" type="button" disabled>
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>
                        </form>
                    @else
                        <span><i class="fa fa-comment-slash"></i></span>
                    @endif
                @endauth



            </div>
        </div>





