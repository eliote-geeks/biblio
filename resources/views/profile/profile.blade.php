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
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                            <img src="{{ Auth::user()->profile_photo_url }}" id="img-uploaded"
                                class="avatar-xl rounded-circle" alt="" />
                            <div class="ms-3">
                                <h4 class="mb-0">Your avatar</h4>
                                <p class="mb-0">
                                    PNG or JPG no bigger than 800px wide and tall.
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="#" class="btn btn-outline-white btn-sm">Update</a>
                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                        </div>
                    </div>
                    <hr class="my-5" />
                    <div>
                        <h4 class="mb-0">Personal Details</h4>
                        <p class="mb-4">
                            Edit your personal information and address.
                        </p>
                        <!-- Form -->
                        <form class="row">

                            <!-- Last name -->
                            <div class="mb-3 col-12 col-md-12">
                                <label class="form-label" for="lname"> Name</label>
                                <input type="text" id="lname" class="form-control" placeholder="Name" required />
                            </div>
                            <!-- First name -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="fname">Matricular</label>
                                <input type="text" id="fname" class="form-control" placeholder="matricular"
                                    required />
                            </div>


                            <!-- Birthday -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="birth">Level</label>
                                <input class="form-control" type="text" placeholder="Level" id="birth"
                                    name="birth" />
                            </div>
                            <!-- Address -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Email</label>
                                <input type="email" id="address" class="form-control" placeholder="email"
                                    required />
                            </div>

                            <!-- State -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Department</label>
                                <select class="selectpicker" data-width="100%">
                                    <option value="">Select Department</option>
                                    <option value="1">Gujarat</option>
                                    <option value="2">Rajasthan</option>
                                    <option value="3">Maharashtra</option>
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
