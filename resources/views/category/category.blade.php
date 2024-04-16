<base href="/">
<x-app>
  <!-- Page header -->
  <div class="py-4 py-lg-6 bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div>
            <h1 class="text-white mb-1 display-4">{{ $category->name }}</h1>
            <p class="mb-0 text-white lead">{{ $books->count() + $ebooks->count()}} books in {{ $category->name }}.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content -->
  <div class="pt-lg-12 pb-lg-3 pt-8 pb-6">
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h2 class="mb-0">Books</h2>
            </div>
        </div>
        <div class="position-relative">
            <ul class="controls " id="sliderFirstControls">
                <li class="prev">
                    <i class="fe fe-chevron-left"></i>
                </li>
                <li class="next">
                    <i class="fe fe-chevron-right"></i>
                </li>
            </ul>
            <div class="sliderFirst">

                @forelse ($books as $book)
                    
                
                <div class="item">
                    <!-- Card -->
                    <div class="card  mb-4 card-hover">
                        <a href="{{ route('book.show',$book) }}" class="card-img-top"><img src="{{'/storage/'.$book->cover_path}}" alt="" class="rounded-top-md card-img-top"></a>
                        <!-- Card Body -->
                        <div class="card-body">
                            <h4 class="mb-2 text-truncate-line-2 "><a href="pages/book-single.html" class="text-inherit">{{\Str::title($book->title)}}</a></h4>
                            <!-- List -->
                            <div class="lh-1">
                                <span>
                                    @for ($k = 1 ; $k <= round(\App\Models\Book::rating($book->id)[0],0) ; $k++)
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    @endfor
                                    @for ($k = 1 ; $k <= 5 - round(\App\Models\Book::rating($book->id)[0],0) ; $k++)
                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                    @endfor
                                      </span>
                                <span class="text-warning">{{\App\Models\Book::rating($book->id)[0]}}</span>
                                <span class="fs-6 text-muted">({{\App\Models\Book::rating($book->id)[1]}})</span>
                    
                            </div>
                            <!-- Price -->
                            <div class="lh-1 mt-3">
                                <span class="text-dark fw-bold">(stock)&nbsp; {{$book->quantity}}</span>
                                {{-- <del class="fs-6 text-muted">$750</del> --}}
                            </div>
                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer">
                            <div class="row align-items-center g-0">
                                <div class="col ms-2">
                                    <span>{{$book->author}}</span>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="text-muted bookmark">
                                        {{-- <i class="fe fe-bookmark  "></i> --}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                @empty
                    <span>Empty</span>
                @endforelse



            </div>
        </div>
    </div>
</div>

<div class="pb-lg-3 pt-lg-3">
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h2 class="mb-0">E-Books</h2>
            </div>
        </div>
        <div class="position-relative">
            <ul class="controls " id="sliderSecondControls">
                <li class="prev">
                    <i class="fe fe-chevron-left"></i>
                </li>
                <li class="next">
                    <i class="fe fe-chevron-right"></i>
                </li>
            </ul>
            <div class="sliderSecond">

        @forelse($ebooks as $e)
                <div class="item">
                    <!-- Card -->
                    <div class="card  mb-4 card-hover">
                        <a href="{{ route('book.show',$e->book) }}" class="card-img-top"><img src="{{'/storage/'.$e->book->cover_path}}" alt="" class="card-img-top rounded-top-md"></a>
                        <!-- Card Body -->
                        <div class="card-body">
                            <h4 class="mb-2 text-truncate-line-2 "><a href="pages/book-single.html" class="text-inherit">{{$e->book->title}}</a></h4>
                            <!-- List -->
                            
                            <div class="lh-1">
                                <span>
                                    @for ($k = 1 ; $k <= round(\App\Models\Book::rating($e->book->id)[0],0) ; $k++)
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    @endfor
                                    @for ($k = 1 ; $k <= 5 - round(\App\Models\Book::rating($e->book->id)[0],0) ; $k++)
                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                    @endfor
                                      </span>
                                <span class="text-warning">{{\App\Models\Book::rating($e->book->id)[0]}}</span>
                                <span class="fs-6 text-muted">({{\App\Models\Book::rating($e->book->id)[1]}})</span>
                    
                            </div>
                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer">
                            <div class="row align-items-center g-0">
                                <div class="col ms-2">
                                    <span>{{$e->book->author}}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        @empty
            <span>empty</span>
        @endforelse

            </div>
        </div>
    </div>
</div>


</x-app>