<x-dash-layout>
    <!-- Container fluid -->
    <div class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                    <div class="mb-3 mb-md-0">
                        <h1 class="mb-1 h2 fw-bold">All Ebook</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Ebook</a>
                                </li>

                            </ol>
                        </nav>
                    </div>
                    @if (auth()->user()->user_type == 'App\Models\Admin')
                        
                    <div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#newCatgory">Add New
                            Ebook</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>


        <div>
            <div class="row">
                <!-- basic table -->
                <div class="col-md-12 col-12 mb-5">
                    <div class="card">

                        <!-- table  -->
                        <div class="card-body pt-2">
                            <table id="dataTableBasic" class="table" style="width:100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>Titre</th>
                                        <th>Ebook Cover \ Description</th>                                        
                                        <th>Auteur</th>
                                        <th>telecharger</th>
                                        <th>Category</th>
                                        {{-- <th>Visualer</th> --}}
                                        @if (auth()->user()->user_type == 'App\Models\Admin')
                        
                                       
                                        <th>action</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ebooks as $ebook)
                                        <tr>
                                            <td><a href="{{ route('book.show',$ebook->book) }}">{{ $ebook->book->title }}</a></td>
                                            <td>
                                                <div class="d-lg-flex align-items-center">
                                                    <div>
                                                        <img src="{{ '/storage/' . $ebook->book->cover_path }}" alt
                                                            alt="" class="img-4by3-lg rounded" height="100" />
                                                    </div>
                                                    <div class="ms-lg-3 mt-2 mt-lg-0">
                                                        <h4 class="mb-1 text-primary-hover">
                                                            {{ \Str::limit($ebook->book->description,20) }}
                                                        </h4>
                                                        <span class="text-inherit">Added on {{ \Carbon\Carbon::parse($ebook->book->created_at)->format('d M Y') }}</span>
                                                    </div>
                                                </div>
                                            </td>                                           
                                            <td>{{ $ebook->book->author }}</td>
                                            <td><a href="{{ asset('storage/' . $ebook->path) }}" class="btn btn-primary mt-3">PDF</a></td>
                                            {{-- @if ($ebook->book->status === 'on')
                                                <td class="align-middle border-top-0">
                                                    <span class="badge-dot bg-success"></span>
                                                </td>
                                            @else

                                            @endif --}}

                                            {{-- <td> --}}

                                                <td class="align-middle border-top-0">
                                                    {{ $ebook->book->category->name }}
                                                </td>

                                              
                                                {{-- <embed src="{{ asset('storage/' . $ebook->path) }}" type="application/pdf" width="100%" height="600px" /> --}}

                                                    {{-- <a href="{{ route('download.pdf', ['ebook' => $ebook->path]) }}" class="btn btn-outline-warning mt-3" type="blank">PDF</a></td> --}}
                                                    @if (auth()->user()->user_type == 'App\Models\Admin')
                        
                                                
                                                    <td class="text-muted align-middle border-top-0">
                                                <span class="dropdown dropstart">
                                                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                                        href="#" role="button" id="courseDropdown1"
                                                        data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                                        aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                                        <span class="dropdown-header">Action</span>
                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#editCatgory{{ $ebook->id }}"
                                                            href="#"><i
                                                                class="fe fe-send dropdown-item-icon"></i>edit</a>
                                                        <form id="deleteForm-{{ $ebook->id }}"
                                                            action="{{ route('ebook.destroy', $ebook->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="#"
                                                                onclick="event.preventDefault(); deleteBook({{ $ebook->id }});"
                                                                class="dropdown-item">
                                                                <i class="fe fe-trash dropdown-item-icon"></i>Delete
                                                            </a>
                                                        </form>

                                                        <script>
                                                            function deleteBook(bookId) {
                                                                if (confirm('Are you sure you want to delete this Ebook?')) {
                                                                    document.getElementById('deleteForm-' + bookId).submit();
                                                                }
                                                            }
                                                        </script>




                                                    </span>
                                                </span>
                                            </td>
                                            @endif


                                        </tr>


                                        <!-- Modal -->
                                        <div class="modal fade" id="editCatgory{{ $ebook->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title mb-0" id="newCatgoryLabel">
                                                            Edit Book {{ $ebook->title }}
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">

                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('ebook.update', $ebook->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @method('PATCH')
                                                            @csrf

                                                            <div class="mb-3 mb-2">
                                                                <label class="form-label" for="title">Titre<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" placeholder="Write a title of ebook " id="title"
                                                                    name="title" value="{{ $ebook->book->title }}" required>
                                                                <small>Field must contain a unique value</small>
                                                                @error('title')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12 mb-4">
                                                                <h5 class="mb-3">PDF Path</h5>
                                    
                                                                <div class="fallback">
                                                                    <input name="path" type="file" accept=".pdf" />

                                                                    
                                                                </div>
                                                                @error('path')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label class="form-label" for="title">auteur<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" placeholder="Write a author " id="title"
                                                                    name="author" value="{{ $ebook->book->author }}" required>
                                                                <small>Field must contain a unique value</small>
                                                                @error('author')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                                            </div>                     
                                                            <div class="col-12 mb-4">
                                                                <h5 class="mb-3">Cover Image </h5>
                                    
                                                                <div class="fallback">
                                                                    <input name="cover_path" type="file" />
                                                                    <img src="{{ '/storage/'.$ebook->book->cover_path }}" class="avatar avatar-lg" alt="">
                                                                </div>
                                                                @error('cover_path')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                    
                                    
                                                            </div>
                                                            <div class="mb-3 mb-2">
                                                                <label class="form-label">Categorie</label>
                                                                <select class="selectpicker" data-width="100%" name="category_id">
                                                                    @foreach (\App\Models\Category::all() as $item)
                                                                        <option
                                                                         @if ( $ebook->book->category_id ==  $item->id)
                                                                            selected
                                                                        @endif  
                                                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                                                    @endforeach
                                    
                                                                </select>
                                                                @error('category_id')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3 mb-3">
                                                                <label class="form-label">Description</label>
                                                                <div>
                                                                    <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $ebook->book->description }}</textarea>
                                    
                                                                </div>
                                                                @error('description')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                                            </div>



                                                            {{-- <div class="mb-2">
                                                                <label class="form-label">Status</label>
                                                                <div class="form-check form-switch">
                                                                    <input type="checkbox" active class="form-check-input" id="customSwitch1" name="status">
                                                                    <label class="form-check-label" for="customSwitch1"></label>
                                                                </div>
                                                                @error('status')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                                            </div> --}}


                                                            <div>
                                                                <button type="submit" class="btn btn-primary">edit
                                                                    Ebook</button>
                                                                <button type="button" class="btn btn-outline-white"
                                                                    data-bs-dismiss="modal">
                                                                    Close
                                                                </button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach




                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>





            </div>

        </div>
    </div>
    </div>


    <!-- Modal -->





    <!-- Modal -->
    <div class="modal fade" id="newCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        Create New Ebook
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ebook.store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                     

                            <div class="mb-3 mb-2">
                                <label class="form-label" for="title">Titre<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Write a title of ebook " id="title"
                                    name="title" required>
                                <small>Field must contain a unique value</small>
                                @error('title')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="col-12 mb-4">
                            <h5 class="mb-3">PDF Path</h5>

                            <div class="fallback">
                                <input name="path" type="file" accept=".pdf" />
                            </div>
                            @error('path')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <label class="form-label" for="title">auteur<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Write a name " id="title"
                                name="author" required>
                            <small>Field must contain a unique value</small>
                            @error('author')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>                     
                        <div class="col-12 mb-4">
                            <h5 class="mb-3">Cover Image </h5>

                            <div class="fallback">
                                <input name="cover_path" type="file" multiple />
                            </div>
                            @error('cover_path')
                                <span>{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="mb-3 mb-2">
                            <label class="form-label">Categorie</label>
                            <select class="selectpicker" data-width="100%" name="category_id">
                                @foreach (\App\Models\Category::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 mb-3">
                            <label class="form-label">Description</label>
                            <div>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>

                            </div>
                            @error('description')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="mb-2">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="customSwitch1" name="status">
                                <label class="form-check-label" for="customSwitch1"></label>
                            </div>
                            @error('status')
                                <span>{{ $message }}</span>
                            @enderror
                        </div> --}}


                        <div>
                            <button type="submit" class="btn btn-primary">Add New Ebook</button>
                            <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                                Close
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-dash-layout>
