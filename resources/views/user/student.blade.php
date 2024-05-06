<x-dash-layout>
    <!-- Container fluid -->
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4">
                    <div>
                        <h1 class="mb-1 h2 fw-bold"> List Of Students</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin-dashboard.html">Dashboard</a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    Students
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
                            <h4 class="mb-1">Students</h4>

                        </div>
                        <!-- table  -->
                        <div class="card-body pt-2">
                            <table id="dataTableBasic" class="table" style="width:100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>matricule</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>department</th>
                                        <th>level</th>
                                        <th>Address</th>
                                        <th>Sex</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $user)
                                        <tr>
                                            <td>{{ $user->matricule }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->dept }}</td>
                                            <td>{{ $user->level }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->sexe }}</td>   
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
