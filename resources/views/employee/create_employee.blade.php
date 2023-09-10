<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="employee"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Create New Student '></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
             
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Create Employee</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('success'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('success') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif
                        <form method='POST' action="{{ route('employee') }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">First Name<span style="color: red;">*</span></label>
                                    <input type="text" name="first_name" class="form-control border border-2 p-2" value='{{ old('first_name') }}'>
                                    @error('first_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control border border-2 p-2" value='{{ old('last_name') }}'>
                                    @error('last_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email <span style="color: red;">*</span></label>
                                    <input type="email" name="email" class="form-control border border-2 p-2" value='{{ old('email') }}'>
                                    @error('email')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div><div class="mb-3 col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone_no" class="form-control border border-2 p-2" value='{{ old('phone_no') }}'>
                                    @error('phone')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div><div class="mb-3 col-md-6">
                                    <label class="form-label">Date Of Join <span style="color: red;">*</span></label>
                                    <input type="date" name="date_of_join" class="form-control border border-2 p-2" value='{{ old('date_of_join') }}'>
                                    @error('date_of_join')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div><div class="mb-3 col-md-6">
                                    <label class="form-label">Date Of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control border border-2 p-2" value='{{ old('date_of_birth') }}'>
                                    @error('date_of_birth')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Status</label>
                                    <select type="text" name="status" class="form-control border border-2 p-2" value='{{ old('status') }}'>
                                        <option value="0">Active</option>
                                        <option value="1">Suspend</option>
                                    </select>
                                    @error('status')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Employee is a Teacher ?</label>
                                    <select type="text" name="is_teacher" class="form-control border border-2 p-2" value='{{ old('status') }}'>
                                        <option value="0">No</option>
                                        <option value="1">YES</option>
                                    </select>
                                    @error('status')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Location</label>
                                    <input type="text" name="address" class="form-control border border-2 p-2" value='{{ old('address') }}'>
                                    @error('address')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                                <!-- <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">About</label>
                                    <textarea class="form-control border border-2 p-2"
                                        placeholder=" Say something about yourself" id="floatingTextarea2" name="about"
                                        rows="4" cols="50">{{ old('about', auth()->user()->about) }}</textarea>
                                        @error('about')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                </div> -->
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Submit</button>
                        </form>

                    </div>
                </div>
                <p ><span style="color: red;">*</span> Required fields</p>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
