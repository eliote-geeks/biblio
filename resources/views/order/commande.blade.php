<x-dash-layout>
    <!-- Container fluid -->
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4">
                    <div>
                        <h1 class="mb-1 h2 fw-bold"> List Of Pending Orders</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin-dashboard.html">Dashboard</a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    Orders
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
                            <h4 class="mb-1"> Pending Oders</h4>

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
                                        <th>back on</th>
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
                                            <td>{{ $order->book->title }}</td>
                                            <td>{{ $order->date_take }}</td>
                                            <td>{{ $order->date_back }}</td>
                                            <td><button class="btn btn-outline-warning"> {{ $order->status }}</button>
                                            </td>


                                            <td class="align-middle border-top-0">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModa{{ $order->id }}">
                                                    Confirm
                                                </button>

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


                                        <div class="modal fade" id="exampleModa{{ $order->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabe" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('order.accept', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabe">Confirm
                                                                this
                                                                action {{ $order->id }} </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure want to borrow this book ?
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

    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="border-bottom pb-4 mb-4">
                    <div>
                        <h1 class="mb-1 h2 fw-bold"> List Of Accepted Orders </h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin-dashboard.html">Dashboard</a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    Orders
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
                            <h4 class="mb-1"> Accepted Orders </h4>

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
                                        <th>back on</th>
                                        <th>status</th>

                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersAccepted as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->book->title }}</td>
                                            <td>{{ $order->date_take }}</td>
                                            <td>{{ $order->date_back }}</td>
                                            <td><button class="btn btn-outline-primary">
                                                    {{ $order->status }}</button></td>

                                            <td class="align-middle border-top-0">

                                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#borrow{{ $order->id }}">
                                                    Confirm
                                                </button>

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
                                        <div class="modal fade" id="borrow{{ $order->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabe" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('order.received', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="borrow">Confirm this
                                                                action {{ $order->id }} </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure this studend has gived back this book?
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

    <!-- Modal -->

</x-dash-layout>
