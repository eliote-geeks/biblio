<base href="/">
<x-app>

    <!-- Page header -->
    <div class="pt-lg-8 pb-lg-16 pt-8 pb-12 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div>
                        <h1 class="text-white display-4 fw-semi-bold">{{ $book->title }}</h1>
                        {{-- <p class="text-white mb-6 lead">
                                JavaScript is the popular programming language which powers web pages and web applications. This book will get you started coding in JavaScript.
                            </p> --}}
                        <div class="d-flex align-items-center">
                            <a href="#" class="bookmark text-white text-decoration-none">
                                <i class="fe fe-bookmark text-white-50 me-2"></i>Enroll
                            </a>

                            <span class="text-white ms-3"><i class="fe fe-user text-white-50"></i> 1200 Enrolled </span>
                            <span class="text-white ms-3"><i class="fe fe-user text-white-50"></i> {{ $book->quantity }}
                                stock </span>

                            <span class="ms-4">
                                @for ($k = 1; $k <= round($student_review, 0); $k++)
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                @endfor
                                @for ($k = 1; $k <= 5 - round($student_review, 0); $k++)
                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                @endfor
                                <span class="text-white">({{ number_format($s) }})</span>
                            </span>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <!-- Card -->
                    <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">
                            <div>
                                <!-- Nav -->
                                <ul class="nav nav-lb-tab" id="tab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="description-tab" data-bs-toggle="pill"
                                            href="#description" role="tab" aria-controls="description"
                                            aria-selected="false">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="review-tab" data-bs-toggle="pill" href="#review"
                                            role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade " id="table" role="tabpanel" aria-labelledby="table-tab">
                                    <!-- Card -->
                                    <div class="accordion" id="bookAccordion">
                                        <div>
                                            <!-- List group -->

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <!-- Description -->
                                    <div class="mb-4">
                                        <h3 class="mb-2">Book Description</h3>
                                        <p>
                                            {!! $book->description !!}
                                        </p>
                                    </div>


                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <!-- Reviews -->
                                    <div class="mb-3">
                                        <h3 class="mb-4">How students rated this books</h3>
                                        <div class="row align-items-center">
                                            <div class="col-auto text-center">
                                                <h3 class="display-2 fw-bold">{{ $student_review }}</h3>
                                                @for ($k = 1; $k <= round($student_review, 0); $k++)
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                @endfor
                                                @for ($k = 1; $k <= 5 - round($student_review, 0); $k++)
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                @endfor
                                                {{-- <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i> --}}
                                                <p class="mb-0 fs-6">(Based on {{ $s }} reviews)</p>
                                            </div>
                                            <!-- Progress bar -->
                                            <div class="col pt-3 order-3 order-md-2">
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: {{ $star5 }}%;" aria-valuenow="90"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: {{ $star4 }}%;" aria-valuenow="80"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: {{ $star3 }}%;" aria-valuenow="70"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: {{ $star2 }}%;" aria-valuenow="60"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-0" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: {{ $star1 }}%;" aria-valuenow="50"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-6 order-2 order-md-3">
                                                <!-- Rating -->
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <span class="ms-1">{{ $star5 }}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{ $star4 }}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{ $star3 }}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{ $star2 }}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{ $star1 }}%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- hr -->
                                    <hr class="my-5" />
                                    <div class="mb-3">
                                        <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                            <!-- Reviews -->
                                            <div class="mb-3 mb-lg-0">
                                                <h3 class="mb-0">Reviews</h3>
                                            </div>
                                            <div>
                                                <!-- Form -->
                                                {{-- @livewire('best-review', ['book' => $book]) --}}
                                                

                                            </div>

















                                        </div>
                                        <div class="tab-pane fade" id="transcript" role="tabpanel"
                                            aria-labelledby="transcript-tab">
                                            <!-- Description -->
                                            <div>
                                                <h3 class="mb-3">Transcript from the "Introduction" Lesson</h3>
                                                <div class="mb-4">
                                                    <h4>book Overview <a href="#"
                                                            class="text-dark ms-2 h4">[00:00:00]</a></h4>
                                                    <p class="mb-0">
                                                        My name is John Deo and I work as human duct tape at Gatsby, that
                                                        means that I do a lot of different things. Everything from dev roll
                                                        to writing content to writing code. And I used to work as an
                                                        architect at IBM. I live in Portland, Oregon.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>Introduction <a href="#"
                                                            class="text-dark ms-2 h4">[00:00:16]</a></h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>Why Take This book? <a href="#"
                                                            class="text-dark ms-2 h4">[00:00:37]</a></h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>A Look at the Demo Application <a href="#"
                                                            class="text-dark ms-2 h4">[00:00:54]</a></h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>Summary <a href="#" class="text-dark ms-2 h4">[00:01:31]</a>
                                                    </h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tab pane -->
                                        <div class="tab-pane fade" id="faq" role="tabpanel"
                                            aria-labelledby="faq-tab">
                                            <!-- FAQ -->
                                            <div>
                                                <h3 class="mb-3">book - Frequently Asked Questions</h3>
                                                <div class="mb-4">
                                                    <h4>How this book help me to design layout?</h4>
                                                    <p>
                                                        My name is Jason Woo and I work as human duct tape at Gatsby, that
                                                        means that I do a lot of different things. Everything from dev roll
                                                        to writing content to writing code. And I used to work as an
                                                        architect at IBM. I live in Portland, Oregon.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>What is important of this book?</h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>Why Take This book?</h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>Is able to create application after this book?</h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <!-- Tab pane -->
                                <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                    <!-- FAQ -->
                                    <div>
                                        <h3 class="mb-3">book - Frequently Asked Questions</h3>
                                        <div class="mb-4">
                                            <h4>How this book help me to design layout?</h4>
                                            <p>
                                                My name is Jason Woo and I work as human duct tape at Gatsby, that means
                                                that I do a lot of different things. Everything from dev roll to writing
                                                content to writing code. And I used to work as an architect at IBM. I
                                                live in Portland, Oregon.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>What is important of this book?</h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna
                                                use the pieces of it that we need to build in Gatsby. We're not gonna be
                                                doing a deep dive into what GraphQL is or the language specifics. We're
                                                also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>Why Take This book?</h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna
                                                use the pieces of it that we need to build in Gatsby. We're not gonna be
                                                doing a deep dive into what GraphQL is or the language specifics. We're
                                                also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>Is able to create application after this book?</h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna
                                                use the pieces of it that we need to build in Gatsby. We're not gonna be
                                                doing a deep dive into what GraphQL is or the language specifics. We're
                                                also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna
                                                use the pieces of it that we need to build in Gatsby. We're not gonna be
                                                doing a deep dive into what GraphQL is or the language specifics. We're
                                                also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 mt-lg-n22">
                    <!-- Card -->
                    <div class="card mb-3 mb-4">
                        <div class="p-1">
                            <div class="d-flex justify-content-center position-relative rounded py-10 border-white border rounded-3 bg-cover"
                                style="background-image: url({{ $book->cover_path }});">

                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Price single page -->

                            <div class="d-grid">
                                <a href="pricing.html" class="btn btn-outline-primary">Enroll</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="ms-4">
                                    <h4 class="mb-0">{{ $book->author }}</h4>
                                    
                                </div>
                            </div>
                            <div class="border-top row mt-3 border-bottom mb-3 g-0">
                                <div class="col">
                                    <div class="pe-1 ps-2 py-3">
                                        <h5 class="mb-0">11,604</h5>
                                        <span>Enrolled</span>
                                    </div>
                                </div>
                                <div class="col border-start">
                                    <div class="pe-1 ps-3 py-3">
                                        <h5 class="mb-0">32</h5>
                                        <span>Book</span>
                                    </div>
                                </div>
                                <div class="col border-start">
                                    <div class="pe-1 ps-3 py-3">
                                        <h5 class="mb-0">12,230</h5>
                                        <span>Reviews</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
@auth
            @livewire('book-rating', ['book' => $book])
 @endauth
            <!-- Card -->
            <div class="pt-12 pb-3">
                <div class="row d-md-flex align-items-center mb-4">
                    <div class="col-12">
                        <h2 class="mb-0">Related Book</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card mb-4 card-hover">
                            <a href="book-single.html" class="card-img-top"><img
                                    src="../assets/images/book/book-react.jpg" alt=""
                                    class="card-img-top rounded-top-md" /></a>
                            <!-- Card body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="book-single.html"
                                        class="text-inherit">How to
                                        easily create a website with React</a></h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i
                                            class="mdi mdi-clock-time-four-outline text-muted me-1"></i>3h 56m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1"
                                                fill="#754FFE" />
                                            <rect x="7" y="5" width="2" height="9" rx="1"
                                                fill="#DBD8E9" />
                                            <rect x="11" y="2" width="2" height="12" rx="1"
                                                fill="#DBD8E9" />
                                        </svg> Beginner
                                    </li>
                                </ul>
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
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="../assets/images/avatar/avatar-1.jpg"
                                            class="rounded-circle avatar-xs" alt="" />
                                    </div>
                                    <div class="col ms-2">
                                        <span>Morris Mccoy</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card mb-4 card-hover">
                            <a href="book-single.html" class="card-img-top"><img
                                    src="../assets/images/book/book-graphql.jpg" alt=""
                                    class="card-img-top rounded-top-md" /></a>
                            <!-- Card body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="book-single.html"
                                        class="text-inherit">GraphQL:
                                        introduction to graphQL for beginners</a></h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i
                                            class="mdi mdi-clock-time-four-outline text-muted me-1"></i>2h 46m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1"
                                                fill="#754FFE" />
                                            <rect x="7" y="5" width="2" height="9" rx="1"
                                                fill="#754FFE" />
                                            <rect x="11" y="2" width="2" height="12" rx="1"
                                                fill="#754FFE" />
                                        </svg> Advance
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                    </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(9,300)</span>
                                </div>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="../assets/images/avatar/avatar-2.jpg"
                                            class="rounded-circle avatar-xs" alt="" />
                                    </div>
                                    <div class="col ms-2">
                                        <span>Ted Hawkins</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card mb-4 card-hover">
                            <a href="book-single.html" class="card-img-top"><img
                                    src="../assets/images/book/book-angular.jpg" alt=""
                                    class="card-img-top rounded-top-md" /></a>
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="book-single.html"
                                        class="text-inherit">Angular -
                                        the complete guide for beginner</a></h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i
                                            class="mdi mdi-clock-time-four-outline text-muted me-1"></i>1h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16"
                                            viewBox="0
                                        0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1"
                                                fill="#754FFE" />
                                            <rect x="7" y="5" width="2" height="9" rx="1"
                                                fill="#DBD8E9" />
                                            <rect x="11" y="2" width="2" height="12" rx="1"
                                                fill="#DBD8E9" />
                                        </svg> Beginner
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                    </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(8,890)</span>
                                </div>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="../assets/images/avatar/avatar-3.jpg"
                                            class="rounded-circle avatar-xs" alt="" />
                                    </div>
                                    <div class="col ms-2">
                                        <span>Juanita Bell</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card mb-4 card-hover">
                            <a href="book-single.html" class="card-img-top"><img
                                    src="../assets/images/book/book-python.jpg" alt=""
                                    class="card-img-top rounded-top-md" /></a>
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="book-single.html"
                                        class="text-inherit">The Python
                                        book: build web application</a></h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i
                                            class="mdi mdi-clock-time-four-outline text-muted me-1"></i>2h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1"
                                                fill="#754FFE" />
                                            <rect x="7" y="5" width="2" height="9" rx="1"
                                                fill="#754FFE" />
                                            <rect x="11" y="2" width="2" height="12" rx="1"
                                                fill="#DBD8E9" />
                                        </svg> Intermediate
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                    </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">(13,245)</span>
                                </div>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="../assets/images/avatar/avatar-4.jpg"
                                            class="rounded-circle avatar-xs" alt="" />
                                    </div>
                                    <div class="col ms-2">
                                        <span>Claire Robertson</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
