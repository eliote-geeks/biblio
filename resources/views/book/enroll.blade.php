<base href="/">
<x-app>

    <div class="py-lg-6 py-4 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div>
                        <h1 class="text-white display-4 mb-0">Enroll Book</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                    <!-- Card -->
                    <div class="card  mb-4">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Fill form with correct informations</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form class="row" method="POST" action="{{ route('enrollBookPost',$book) }}">
                                @csrf
                                <!-- First name  -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="fname">Date Take</label>
                                    <input type="date" id="fname" class="form-control" name="dateTake" placeholder="date take"
                                        required>
                                        @error('dateTake')
                                        <small class="text-danger">{{ $message }}</small>    
                                        @enderror
                                </div>
                                <!-- Last name  -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="lname">Date Back</label>
                                    <input type="date" id="lname" class="form-control" name="dateBack" placeholder="date back"
                                        required>
                                        @error('dateBack')
                                        <small class="text-danger">{{ $message }}</small>    
                                        @enderror
                                </div>
                              
                                <!-- Address  -->
                                <div class="mb-3 col-12 col-md-12">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</x-app>
