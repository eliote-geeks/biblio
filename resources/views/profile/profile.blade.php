<base href="/">
<x-app>
    <x-app-student>
        <div class="col-lg-9 col-md-8 col-12">
            <!-- Card -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Profile Details</h3>
                    <p class="mb-0">
                        You have full control to manage your own account setting.
                    </p>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    {{-- @livewire('profile-edit') --}}
                    <hr class="my-5" />
                    <div>
                        <h4 class="mb-0">Personal Details</h4>
                        <p class="mb-4">
                            Edit your personal information and address.
                        </p>
                        <!-- Form -->
                        <form class="row" method="POST" action="{{ route('updateProfile') }}">
                            @csrf
                            <!-- Last name -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="lname"> Name</label>
                                <input type="text" id="lname" class="form-control" placeholder="Name"
                                    name="name" required />
                            </div>
                            <!-- First name -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="fname">Matricular</label>
                                <input type="text" id="fname" class="form-control" placeholder="matricular"
                                    name="matricular" required />
                            </div>


                            <!-- Birthday -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="birth">Level</label>
                                <input class="form-control" type="text" placeholder="Level" id="birth"
                                    name="birth" name="level" />
                            </div>
                            <!-- Address -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Address</label>
                                <input type="text" id="address" class="form-control" placeholder="address"
                                    name="address" required />
                            </div>

                            <!-- State -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Department</label>
                                <select class="selectpicker" name="department" data-width="100%">
                                    <option value="">Select Department</option>
                                    <option value="1">Gujarat</option>
                                    <option value="2">Rajasthan</option>
                                    <option value="3">Maharashtra</option>
                                </select>
                            </div>

                            <!-- State -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Sexe</label>
                                <select class="selectpicker" name="sexe" data-width="100%">
                                    <option value="">Select sexe</option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <!-- Button -->
                                <button class="btn btn-primary" type="submit">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-student>
</x-app>
