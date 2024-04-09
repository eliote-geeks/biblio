<x-dash-layout>
    <!-- Container fluid -->
    <div class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                    <div class="mb-3 mb-md-0">
                        <h1 class="mb-1 h2 fw-bold">All Books</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin-dashboard.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Books</a>
                                </li>

                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#newCatgory">Add New
                            Book</a>
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
                                        <th>Book Cover \ Description</th>
                                        <th>Titre</th>
                                        <th>Auteur</th>
                                        <th>nombre</th>
                                        <th>Status</th>
                                        <th>Categorie</th>
                                        <th>action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-lg-flex align-items-center">
                                                <div>
                                                    <img src="../../assets/images/course/course-gatsby.jpg"
                                                        alt="" class="img-4by3-lg rounded" />
                                                </div>
                                                <div class="ms-lg-3 mt-2 mt-lg-0">
                                                    <h4 class="mb-1 text-primary-hover">
                                                        Revolutionize how you build the web...
                                                    </h4>
                                                    <span class="text-inherit">Added on 7 July, 2021</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td class="align-middle border-top-0">
                                            <span class="badge-dot bg-success"></span>
                                        </td>
                                        <td>$320,800</td>
                                        <td class="text-muted align-middle border-top-0">
                                            <span class="dropdown dropstart">
                                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                    role="button" id="courseDropdown1" data-bs-toggle="dropdown"
                                                    data-bs-offset="-20,20" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                                    <span class="dropdown-header">Action</span>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fe fe-send dropdown-item-icon"></i>Publish</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fe fe-inbox dropdown-item-icon"></i>Moved
                                                        Draft</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-lg-flex align-items-center">
                                                <div>
                                                    <img src="../../assets/images/course/course-gatsby.jpg"
                                                        alt="" class="img-4by3-lg rounded" />
                                                </div>
                                                <div class="ms-lg-3 mt-2 mt-lg-0">
                                                    <h4 class="mb-1 text-primary-hover">
                                                        Revolutionize how you build the web...
                                                    </h4>
                                                    <span class="text-inherit">Added on 7 July, 2021</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td class="align-middle border-top-0">
                                            <span class="badge-dot bg-success"></span>
                                        </td>
                                        <td>$170,750</td>
                                        <td class="text-muted align-middle border-top-0">
                                            <span class="dropdown dropstart">
                                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                    role="button" id="courseDropdown1" data-bs-toggle="dropdown"
                                                    data-bs-offset="-20,20" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                                    <span class="dropdown-header">Action</span>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fe fe-send dropdown-item-icon"></i>Publish</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fe fe-inbox dropdown-item-icon"></i>Moved
                                                        Draft</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>





            </div>

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
                        Create New Book
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3 mb-2">
                            <label class="form-label" for="title">Titre<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Write a name " id="title" name="title"
                                required>
                            <small>Field must contain a unique value</small>
                        </div>
                        <div class="mb-3 mb-2">
                            <label class="form-label" for="title">auteur<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Write a name " id="title" name="author"
                                required>
                            <small>Field must contain a unique value</small>
                        </div>
                        <div class="mb-3 mb-2">
                            <label class="form-label" for="title">Nombre<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="20" id="title" name="quantity"
                                required>
                            <small>Field must contain a unique value</small>
                        </div>
                        <div class="col-12 mb-4">
                            <h5 class="mb-3">Cover Image </h5>

                            <form action="#" class="d-block dropzone border-dashed min-h-0 rounded-2">
                              <div class="fallback">
                                <input name="cover_path" type="file" multiple />
                              </div>
                            </form>


                          </div>
                        <div class="mb-3 mb-2">
                            <label class="form-label">Categorie</label>
                            <select class="selectpicker" data-width="100%" name="category_id">
                                <option value="">Select</option>
                                <option value="Course">Course</option>
                                <option value="Tutorial">Tutorial</option>
                                <option value="Workshop">Workshop</option>
                                <option value="Company">Company</option>
                            </select>
                        </div>
                        <div class="mb-3 mb-3">
                            <label class="form-label">Description</label>
                            <div id="editor">
                                <input type="textarea" name="description">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="customSwitch1" checked name="status">
                                <label class="form-check-label" for="customSwitch1"></label>
                            </div>
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
