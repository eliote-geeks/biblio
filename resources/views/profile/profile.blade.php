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
                    @if (session()->has('message'))
                        <p class="alert alert-success">{{ session()->get('message') }}</p>
                    @endif
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
                                    name="name" value="{{ Auth::user()->name }}" required />

                                    @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <!-- First name -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="fname">Matricular</label>
                                <input type="text" id="fname" class="form-control" placeholder="matricular"
                                    name="matricular" value="{{ Auth::user()->matricule }}" required />
                                    @error('matricular')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>


                            <!-- Birthday -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="birth">Level</label>
                                <input class="form-control" type="text" placeholder="Level" id="birth"
                                     name="level" value="{{ Auth::user()->level }}" />
                            </div>
                            <!-- Address -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Address</label>
                                <input type="text" id="address" class="form-control" placeholder="address"
                                    name="address" value="{{ Auth::user()->address }}" required />
                                    @error('level')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <!-- State -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Department</label>
                                <select class="selectpicker" name="department" data-width="100%">
                                    <option value="{{ Auth::user()->dept }}">{{ Auth::user()->dept }}</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                </select>
                                @error('department')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <!-- State -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Sexe</label>
                                <select class="selectpicker" name="sexe" data-width="100%">
                                    <option value="">Select sexe</option>
                                    <option @if(Auth::user()->sexe == 'male') selected @endif value="male">male</option>
                                    <option @if(Auth::user()->sexe == 'female') selected @endif value="female">female</option>
                                </select>
                                @error('sexe')<small class="text-danger">{{ $message }}</small>@enderror
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
