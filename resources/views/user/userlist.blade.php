<base href="/">
<x-dash-layout>
    <!-- Container fluid -->
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4">
                    <div>
                        <h1 class="mb-1 h2 fw-bold"> List Of Users</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin-dashboard.html">Dashboard</a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    Users
                                </li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

        </div>
        <div>
            <div class="row">
                <!-- basic table -->
                <div class="col-md-12 col-12 mb-5">
                    <div class="card">
                        <!-- card header  -->
                        <div class="card-header border-bottom-0">
                            <h4 class="mb-1">Users</h4>

                        </div>
                        <!-- table  -->
                        <div class="card-body pt-2">
                            <table id="dataTableBasic" class="table" style="width:100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>usertype</th>

                                        <th>Role</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->user_type == 'App\Models\Admin')
                                                    Library
                                                @else
                                                    Student
                                                @endif
                                            </td>

                                            <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModa{{ $user->id }}">
                                                    @if ($user->user_type == 'App\Models\Admin')
                                                        name as Student
                                                    @else
                                                        name as Library
                                                    @endif
                                                </button></td>
                                            <td class="align-middle border-top-0">
                                                <form action="{{ route('student.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        onclick="return(confirm('are you sure to delete this user ?'))"
                                                        type="submit" class="btn btn-danger" data-bs-toggle="tooltip"
                                                        data-placement="top" title="Delete">delete</button>

                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="exampleModa{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabe" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('student.update', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabe">Confirm
                                                                this
                                                                action {{ $user->id }} </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure ? Please confirm this action ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </div>
                                                </form>
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



    </div>
</x-dash-layout>
