<x-dash-layout>
    <!-- Container fluid -->
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4">
                    <div>
                        <h1 class="mb-1 h2 fw-bold"> DashBoard</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin-dashboard.html">Dashboard</a>
                                </li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

        </div>
        <div>

       
            <!-- Content -->
            <div class="pb-5 py-md-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Side Navbar -->
                            <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
                                <li class="nav-item ms-0" role="presentation">
                                    <a class="nav-link active " id="bookmarked-tab" data-bs-toggle="pill"
                                        href="#bookmarked" role="tab" aria-controls="bookmarked"
                                        aria-selected="true">Bookmarked </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="currentlyLearning-tab" data-bs-toggle="pill"
                                        href="#currentlyLearning" role="tab" aria-controls="currentlyLearning"
                                        aria-selected="false">Learning</a>
                                </li>

                            </ul>
                            <!-- Tab content -->
                            <div class="tab-content" id="tabContent">



                                <div class="tab-pane fade show active" id="bookmarked" role="tabpanel"
                                    aria-labelledby="bookmarked-tab">
                                    <div class="row">

                                        @foreach ($books as $book)
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <!-- Card -->
                                                <div class="card  mb-4 card-hover">
                                                    <a href="{{ route('book.show', $book->id) }}"
                                                        class="card-img-top"><img
                                                            src="{{ '/storage/' . $book->cover_path }}" alt=""
                                                            class="card-img-top rounded-top-md"></a>
                                                    <!-- Card body -->
                                                    <div class="card-body">
                                                        <h3 class="h4 mb-2 text-truncate-line-2 "><a
                                                                href="{{ route('book.show', $book->id) }}"
                                                                class="text-inherit">{{ $book->title }}</a>
                                                        </h3>
                                                        <!-- List inline -->
                                                        <div class="lh-1">
                                                            <span>
                                                                @for ($k = 1; $k <= round(\App\Models\Book::rating($book->id)[0], 0); $k++)
                                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                                @endfor
                                                                @for ($k = 1; $k <= 5 - round(\App\Models\Book::rating($book->id)[0], 0); $k++)
                                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                                @endfor
                                                            </span>
                                                            <span
                                                                class="text-warning">{{ \App\Models\Book::rating($book->id)[0] }}</span>
                                                            <span
                                                                class="fs-6 text-muted">({{ \App\Models\Book::rating($book->id)[1] }})</span>

                                                        </div>
                                                        <!-- Price -->
                                                        <div class="lh-1 mt-3">
                                                            <span class="text-dark fw-bold">(stock)&nbsp;
                                                                {{ $book->quantity }}</span>
                                                            {{-- <del class="fs-6 text-muted">$750</del> --}}
                                                        </div>
                                                    </div>
                                                    <!-- Card footer -->
                                                    <div class="card-footer">
                                                        <div class="row align-items-center g-0">
                                                            <div class="col ms-2">
                                                                <span>{{ $book->author }}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <a href="{{ route('removeMyBook', $book->id) }}"
                                                                    class="removeBookmark">
                                                                    <i class="fe fe-trash mdi-18px "></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="row">
                                        <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
                                            <p>You’ve reached the end of the list</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- </div> --}}

                                <div class="tab-pane fade" id="currentlyLearning" role="tabpanel"
                                    aria-labelledby="currentlyLearning-tab">
                                    <div class="row">
                                        @foreach ($booksOK as $book)
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <!-- Card -->
                                                <div class="card  mb-4 card-hover">
                                                    <a href="{{ route('book.show', $book->id) }}"
                                                        class="card-img-top"><img
                                                            src="{{ '/storage/' . $book->cover_path }}" alt=""
                                                            class="card-img-top rounded-top-md"></a>
                                                    <!-- Card body -->
                                                    <div class="card-body">
                                                        <h3 class="h4 mb-2 text-truncate-line-2 "><a
                                                                href="{{ route('book.show', $book->id) }}"
                                                                class="text-inherit">{{ $book->title }}</a>
                                                        </h3>
                                                        <!-- List inline -->
                                                        <div class="lh-1">
                                                            <span>
                                                                @for ($k = 1; $k <= round(\App\Models\Book::rating($book->id)[0], 0); $k++)
                                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                                @endfor
                                                                @for ($k = 1; $k <= 5 - round(\App\Models\Book::rating($book->id)[0], 0); $k++)
                                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                                @endfor
                                                            </span>
                                                            <span
                                                                class="text-warning">{{ \App\Models\Book::rating($book->id)[0] }}</span>
                                                            <span
                                                                class="fs-6 text-muted">({{ \App\Models\Book::rating($book->id)[1] }})</span>

                                                        </div>
                                                        <!-- Price -->
                                                        <div class="lh-1 mt-3">
                                                            <span class="text-dark fw-bold">(stock)&nbsp;
                                                                {{ $book->quantity }}</span>
                                                            {{-- <del class="fs-6 text-muted">$750</del> --}}
                                                        </div>
                                                    </div>
                                                    <!-- Card footer -->
                                                    <div class="card-footer">
                                                        <div class="row align-items-center g-0">
                                                            <div class="col ms-2">
                                                                <span>{{ $book->author }}</span>
                                                            </div>

                                                            <div class="">
                                                                @php
                                                                    $startDate = \Carbon\Carbon::parse(
                                                                        $book->date_take,
                                                                    );
                                                                    $endDate = \Carbon\Carbon::parse($book->date_back);
                                                                    $diff = $endDate->diffInDays($startDate);

                                                                @endphp
                                                                @if ($book->date_back < \Carbon\Carbon::now())
                                                                    <p class="alert alert-danger">Days lefts please go
                                                                        back now </p>
                                                                @else
                                                                    <p class="alert alert-warning">{{ $diff }}
                                                                        day(s) left(s)</p>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach

                                    </div>
                                    <div class="row">
                                        <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
                                            <p>You’ve reached the end of the list</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Path -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</x-dash-layout>
