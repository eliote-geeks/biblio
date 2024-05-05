<x-dash-layout>
    <!-- Container fluid -->
    <div class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                    <div class="mb-3 mb-md-0">
                        <h1 class="mb-1 h2 fw-bold">All Categories</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin-dashboard.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Category</a>
                                </li>

                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#newCatgory">Add New
                            Category</a>
                    </div>
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
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>action</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($category as $cat)
                                        <tr>
                                            <td>{{ $cat->id }}</td>
                                            <td>{{ $cat->name }}</td>
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



                                                                <form id="deleteForm-{{$cat->id}}" action="{{route('category.destroy',$cat->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a href="#" onclick="event.preventDefault(); deleteBook({{$cat->id}});" class="dropdown-item">
                                                                        <i class="fe fe-trash dropdown-item-icon"></i>Delete
                                                                    </a>
                                                                </form>

                                                                <script>
                                                                    function deleteBook(bookId) {
                                                                        if (confirm('Are you sure you want to delete this category?')) {
                                                                            document.getElementById('deleteForm-' + bookId).submit();
                                                                        }
                                                                    }
                                                                </script>
                                                    </span>
                                                </span>
                                            </td>
                                            <td><button class="dropdown-item btn btn-primary" href="#"><i
                                                class="fe fe-edit dropdown-item-icon" data-bs-toggle="modal"
                                                data-bs-target="#editCatgory{{$cat->id}}" ></i></button></td>
                                        </tr>


                                        <div class="modal fade" id="editCatgory{{$cat->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="editCatgoryLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title mb-0" id="editCatgoryLabel">
                                                            Edit Category
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">

                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('category.update',$cat->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="form-label" for="title">Name<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Write a name " id="title"
                                                                    name="name" required value="{{ $cat->name }}">
                                                                <small>Field must contain a unique value</small>
                                                                @error('name')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div>
                                                                <button type="submit" class="btn btn-primary">Edit
                                                                    category</button>
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
                        Create New Category
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="mb-3 mb-2">
                            <label class="form-label" for="title">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Write a name " id="title"
                                name="name" required>
                            <small>Field must contain a unique value</small>
                            @error('name')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Add New Book</button>
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
