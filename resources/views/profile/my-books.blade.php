<base href="/">
<x-app>
    {{-- <x-app-student> --}}


          <!-- Page Content -->
  <div class="pt-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
          <!-- Bg -->
          <div class=" pt-16 rounded-top-md " style="
                   background: url(../assets/images/background/profile-bg.jpg) no-repeat;
                    background-size: cover;">
          </div>
          <div
            class="d-flex align-items-end justify-content-between bg-white px-4  pt-2 pb-4 rounded-bottom-md shadow-sm ">
            <div class="d-flex align-items-center">
              <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                <img src="{{ auth()->user()->profile_photo_url }}" class="avatar-xl rounded-circle border border-4 border-white"
                  alt="">
              </div>
              <div class="lh-1">
                <h2 class="mb-0">{{ auth()->user()->name }}
                 
                </h2>
                <p class=" mb-0 d-block">{{ '@'.auth()->user()->name }}</p>
              </div>
            </div>
            <div>
              <a href="{{ route('profileUser') }}" class="btn btn-primary btn-sm d-none d-md-block">Account
                Setting</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content -->
  <div class="pb-5 py-md-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Side Navbar -->
          <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
            <li class="nav-item ms-0" role="presentation">
              <a class="nav-link active " id="bookmarked-tab" data-bs-toggle="pill" href="#bookmarked" role="tab"
                aria-controls="bookmarked" aria-selected="true">Wait</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="currentlyLearning-tab" data-bs-toggle="pill" href="#currentlyLearning" role="tab"
                aria-controls="currentlyLearning" aria-selected="false">Bookmarked && Deadline </a>
            </li>
          
          </ul>
          <!-- Tab content -->
          <div class="tab-content" id="tabContent">
            <div class="tab-pane fade show active" id="bookmarked" role="tabpanel" aria-labelledby="bookmarked-tab">
              <div class="row">
                
                @foreach ($books as $book)
                  <div class="col-lg-3 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card  mb-4 card-hover">
                      <a href="{{ route('book.show',$book->id) }}" class="card-img-top"><img src="{{ $book->cover_path }}" alt=""
                          class="card-img-top rounded-top-md"></a>
                      <!-- Card body -->
                      <div class="card-body">
                        <h3 class="h4 mb-2 text-truncate-line-2 "><a href="{{ route('book.show',$book->id) }}" class="text-inherit">{{$book->title}}</a>
                        </h3>
                        <!-- List inline -->
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
                      <!-- Card footer -->
                      <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col ms-2">
                                        <span>{{$book->author}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('removeMyBook',$book->id) }}" class="removeBookmark">
                                            <i class="mdi mdi-bookmark mdi-18px "></i>
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

        
          </div>

            <div class="tab-pane fade" id="currentlyLearning" role="tabpanel" aria-labelledby="currentlyLearning-tab">
              <div class="row">

                 @foreach ($booksOK as $book)
                  <div class="col-lg-3 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card  mb-4 card-hover">
                      <a href="{{ route('book.show',$book->id) }}" class="card-img-top"><img src="{{ $book->cover_path }}" alt=""
                          class="card-img-top rounded-top-md"></a>
                      <!-- Card body -->
                      <div class="card-body">
                        <h3 class="h4 mb-2 text-truncate-line-2 "><a href="{{ route('book.show',$book->id) }}" class="text-inherit">{{$book->title}}</a>
                        </h3>
                        <!-- List inline -->
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
                      <!-- Card footer -->
                      <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col ms-2">
                                        <span>{{$book->author}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('removeMyBook',$book->id) }}" class="removeBookmark">
                                            <i class="mdi mdi-bookmark mdi-18px "></i>
                                        </a>
                                    </div>
                                    <div class="" >
                                     @php
                                        $startDate = \Carbon\Carbon::parse($book->date_take); 
                                        $endDate = \Carbon\Carbon::parse($book->date_back);
                                        $diff = $endDate->diffInDays($startDate);
                                        
                                      @endphp

                                     <p class="alert alert-warning">{{ $diff }} day(s) left(s)</p> 
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




    {{-- </x-app-student> --}}
</x-app>