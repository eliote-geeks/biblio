<div class="mb-3">
    <div class="d-lg-flex align-items-center justify-content-between mb-5">
        <!-- Reviews -->
        <div class="mb-3 mb-lg-0">
            <h3 class="mb-0">Reviews</h3>
        </div>
        <form class="form-inline">
            <div class="d-flex align-items-center me-2">
                <span class="position-absolute ps-3">
                    <i class="fe fe-search"></i>
                </span>
                <input type="search" class="form-control ps-6" placeholder="Search Review"
                    wire:loading.attr='disabled' />
            </div>
        </form>
    </div>
    @forelse ($bestReviews as $bestReview)
        <!-- Rating -->
        <div class="d-flex border-bottom pb-4 mb-4">

            <img src="{{ $bestReview->user->profile_photo_url }}" alt="" class="rounded-circle avatar-lg" />
            <div class=" ms-3">
                <h4 class="mb-1">
                    <a href="javascript:;">{{ $bestReview->user->name }}</a>
                    <span class="ms-1 fs-6 text-muted">{{ $bestReview->created_at->diffForHumans() }}</span>
                </h4>
                <div class="fs-6 mb-2">
                    @for ($j = 0; $j < $bestReview->rating; $j++)
                        <i class="mdi mdi-star me-n1 text-warning"></i>
                    @endfor

                    @for ($j = 0; $j < $bestReview->rating - 5; $j++)
                        <i class="mdi mdi-star me-n1 text-light"></i>
                    @endfor
                </div>
                <p>{{ $bestReview->review }}</p>

            </div>
        </div>
    @empty
        <span>No reviews</span>
    @endforelse
</div>
