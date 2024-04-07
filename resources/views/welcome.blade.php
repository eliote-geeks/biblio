<base href="/">
<x-app>
    <div class="bg-primary">
        <div class="container">
            <!-- Hero Section -->
            <div class="row align-items-center g-0">
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <div class="py-5 py-lg-0">
                        <h1 class="text-white display-4 fw-bold">Welcome to Geeks Library Application
                        </h1>
                        <p class="text-white-50 mb-4 lead">
                            Hand-picked  expertly crafted books, designed for the modern students.
                        </p>
                    </div>
                </div>
                <div class=" col-xl-7 col-lg-6 col-md-12 text-lg-end text-center">
                    <img src="assets/images/hero/hero-img.png" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="bg-white py-4 shadow-sm">
        <div class="container">
            <div class="row align-items-center g-0">
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
                    <div class="d-flex align-items-center">
                        <span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                class="fe fe-video"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">30,000 online courses</h4>
                            <p class="mb-0">Enjoy a variety of fresh topics</p>
                        </div>
                    </div>
                </div>
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
                    <div class="d-flex align-items-center">
                        <span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                class="fe fe-users"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">Expert instruction</h4>
                            <p class="mb-0">Find the right instructor for you</p>
                        </div>
                    </div>
                </div>
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="d-flex align-items-center">
                        <span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                class="fe fe-clock"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">Lifetime access</h4>
                            <p class="mb-0">Learn on your schedule</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



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
                            <a href="{{ route('book.show',$book) }}" class="card-img-top"><img src="{{$book->cover_path}}" alt="" class="rounded-top-md card-img-top"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">{{\Str::title($book->title)}}</a></h4>
                                <!-- List -->
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(7,700)</span>
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
                            <a href="{{ route('book.show',$e->book) }}" class="card-img-top"><img src="{{$e->book->cover_path}}" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit">{{$e->book->title}}</a></h4>
                                <!-- List -->
                                
                                <div class="lh-1">
                                    <span>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(9,370)</span>
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