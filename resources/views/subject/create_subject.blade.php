<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="subject"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Create New Subject '></x-navbars.navs.auth>
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
                                <h6 class="mb-3">Create Subject</h6>
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
                        <form method='POST' action='{{ route('subject') }}'>
                            @csrf
                            <div class="row">
                                
                              
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Subject Name <span style="color: red;">*</span></label>
                                    <input type="text" name="subject_name" class="form-control border border-2 p-2" value='{{ old('subject_name') }}'>
                                    @error('subject_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Fees <span style="color: red;">*</span></label>
                                    <input type="text" name="fees" class="form-control border border-2 p-2" value='{{ old('fees') }}'>
                                    @error('fees')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                               
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Status <span style="color: red;">*</span></label>
                                    <select type="date" name="status" class="form-control border border-2 p-2" value='{{ old('status') }}'>
                                        <option value="1">Active</option>
                                        <option value="0">Suspend</option>
                                    </select>
                                    @error('status')
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
