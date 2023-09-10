<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="student"></x-navbars.sidebar>
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
                                <h6 class="mb-3">Create Student</h6>
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
                        @endif
                        @if (session('error'))
                        <div class="row">
                        <div class="alert alert-primary alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('error') }} </span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
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
                        <form method='POST' action='{{ route('student') }}'>
                            @csrf
                            <div class="row">
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">First Name <span style="color: red;">*</span></label>
                                    <input type="text" name="first_name" class="form-control border border-2 p-2" value='{{ old('first_name') }}'>
                                    @error('first_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control border border-2 p-2" value='{{ old('last_name', auth()->user()->last_name) }}'>
                                    @error('last_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Gender <span style="color: red;">*</span></label>
                                    <select type="date" name="gender" class="form-control border border-2 p-2" value="{{ old('gender') }}">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('gender')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Date of Birth <span style="color: red;">*</span></label>
                                    <input type="date" name="date_of_birth" class="form-control border border-2 p-2" value="{{ old('date_of_birth') }}">
                                    @error('date_of_birth')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Date of Join <span style="color: red;">*</span></label>
                                    <input type="date" name="date_of_join" class="form-control border border-2 p-2" value="{{ old('date_of_join') }}">
                                    @error('date_of_join')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Starting Class</label>
                                    <select name="class_id" id="class_id" class="form-control border border-2 p-2" @if($selected_class) disabled @endif>
                                    @foreach($classes as $class)   
                                    <option value="{{$class->id}}" {{  $selected_class == $class->id ? 'selected' : '' }} >{{$class->class_name}}</option>
                             
                                    @endforeach
                                    </select>
                                    <!-- <input type="date" name="starting_class" class="form-control border border-2 p-2" value="{{ old('starting_class') }}"> -->
                                    @error('starting_class')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Family Phone No <span style="color: red;">*</span></label>
                                    <input type="text" name="family_phone_no" class="form-control border border-2 p-2" value='{{ old('family_phone_no') }}'>
                                    @error('family_phone_no')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Status</label>
                                    <select type="date" name="status" class="form-control border border-2 p-2" value='{{ old('status') }}'>
                                        <option value="1">Active</option>
                                        <option value="0">Suspend</option>
                                    </select>
                                    @error('status')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                                <div class="mb-3 col-md-6">
                                    <label for="floatingTextarea2">Address</label>
                                    <textarea class="form-control border border-2 p-2"
                                        placeholder=" Say something about yourself" id="floatingTextarea2" name="address"
                                        rows="4" cols="50">{{ old('address' ) }}</textarea>
                                        @error('address')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                </div>
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
