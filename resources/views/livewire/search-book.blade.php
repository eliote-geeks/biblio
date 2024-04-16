<div class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <span class="position-absolute ps-3 search-icon">
        <i class="fe fe-search"></i>
    </span>
    <input type="search" class="form-control ps-6" placeholder="Search Book" wire:model.live='search' />&nbsp;&nbsp;
    <div wire:loading>
        Loading...
    </div>
    @if ($search != '')
        <div class="container col-6 mb-9">
            <!-- Flush list -->
            <ul class="list-group list-group-flush">
                @forelse($books as $book)
                    <li class="list-group-item"><a
                            href="{{ route('book.show', $book->id) }}">{{ \Str::title($book->title) }} </a></li>
                @empty
                    <span class="list-group-item">no result</span>
                @endforelse
            </ul>
        </div>
    @endif
</div>
