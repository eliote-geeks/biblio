<x-dash-layout>
    {{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}



<!-- Page Header -->
            <!-- Container fluid -->
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-lg-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-lg-0">
                                <h1 class="mb-0 h2 fw-bold">Dashboard</h1>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">Books</span>
                                    </div>
                                    <div>
                                        <span class="fe fe-book fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                   {{ \App\Models\Book::count() }}
                                </h2>
                                <span class="text-success fw-semi-bold"><i class="fe fe-trending-up me-1"></i>+20.9</span>
                                <span class="ms-1 fw-medium">Number of Book</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">Ebooks</span>
                                    </div>
                                    <div>
                                        <span class=" fe fe-book-open fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    {{ \App\Models\Ebook::count() }}
                                </h2>
                                <span class="text-danger fw-semi-bold">120+</span>
                                <span class="ms-1 fw-medium">Number of Ebooks</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">Students</span>
                                    </div>
                                    <div>
                                        <span class=" fe fe-users fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                {{ \App\Models\User::where('user_type')->count() }}
                                </h2>
                                <span class="text-success fw-semi-bold"><i class="fe fe-trending-up me-1"></i>+1200</span>
                                <span class="ms-1 fw-medium">Students</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">pendind orders</span>
                                    </div>
                                    <div>
                                        <span class=" fe fe-user-check fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    {{ \App\Models\Order::where('status', 'wait')->count() }}
                                </h2>
                                <span class="text-success fw-semi-bold"><i class="fe fe-trending-up me-1"></i>+200</span>
                                <span class="ms-1 fw-medium">Orders </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-0">Books by month</h4>
                                </div>
                                <div>
                                    <div class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="courseDropdown1">
                                            <span class="dropdown-header">Settings</span>
                                            <a class="dropdown-item" href="#"><i
                            class="fe fe-external-link dropdown-item-icon "></i>Export</a>
                                            <a class="dropdown-item" href="#"><i class="fe fe-mail dropdown-item-icon "></i>Email
                          Report</a>
                                            <a class="dropdown-item" href="#"><i
                            class="fe fe-download dropdown-item-icon "></i>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Earning chart -->
                                {{-- <div id="earning" class="apex-charts"></div> --}}
                                <div>
                                    {!! $chart1->renderHtml() !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header align-items-center card-header-height  d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-0">Orders by month</h4>
                                </div>
                                <div>
                                    <div class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="courseDropdown2">
                                            <span class="dropdown-header">Settings</span>
                                            <a class="dropdown-item" href="#"><i
                            class="fe fe-external-link dropdown-item-icon "></i>Export</a>
                                            <a class="dropdown-item" href="#"><i class="fe fe-mail dropdown-item-icon "></i>Email
                          Report</a>
                                            <a class="dropdown-item" href="#"><i
                            class="fe fe-download dropdown-item-icon "></i>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                {{-- <div id="traffic" class="apex-charts d-flex justify-content-center"></div>
                                 --}}
                                 <div>
                                    {!! $chart2->renderHtml() !!}</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}

    {!! $chart2->renderChartJsLibrary() !!}
    {!! $chart2->renderJs() !!}
</x-dash-layout>
