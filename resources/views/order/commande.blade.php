<x-dash-layout>
    <!-- Container fluid -->
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4">
                    <div>
                        <h1 class="mb-1 h2 fw-bold"> List Of Oders</h1>
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
                            <h4 class="mb-1">Oders</h4>

                        </div>
                        <!-- table  -->
                        <div class="card-body pt-2">
                            <table id="dataTableBasic" class="table" style="width:100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>book</th>
                                        <th>take on</th>
                                        <th>bask on</th>
                                        <th>status</th>

                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->book->title  }}</td>
                                            <td>{{ $order->date_take }}</td>
                                            <td>{{ $order->date_back }}</td>
                                            <td>{{ $order->status }}</td>

                                            <td class="align-middle border-top-0">
                                                <a href="#" class="fe fe-mail text-muted" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Message">
                                                </a>
                                            </td>
                                            <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td class="align-middle border-top-0">
                                                    <button type="submit" class="text-muted" data-bs-toggle="tooltip"
                                                        data-placement="top" title="Delete"><i
                                                            class="fe fe-trash"></i></button>
                                                </td>
                                            </form>
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
