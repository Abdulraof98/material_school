<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="teacher"></x-navbars.sidebar>
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Teacher Profile '></x-navbars.navs.auth>
        <!-- End Navbar -->
    <div class="container-fluid px-2 px-md-4">
                <div class="page-header min-height-300 border-radius-xl mt-4"
                    style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                    <span class="mask  bg-gradient-primary  opacity-6"></span>
                </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="col-lg-7 col-md-9 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#profile"aria-controls="preview" role="tab" aria-selected="true">
                    <i class="material-icons text-lg position-relative">home</i>
                    <span class="ms-1">Profile</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#payments" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">email</i>
                    <span class="ms-1">Classes</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#notifications" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Salary</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#transactions" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Transaction</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#account" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Account</span>
                    </a>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
            <div class="tab-pane fade" id="account" >
            
                    <div class="card">
                        <div class="card-header pb-0 p-3  " >
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-3">Account</h6>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Account Number</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Balance</th>
                                    <!-- <th class="text-secondary opacity-7"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="align-middle  text-sm">
                                    <p class="text-xs text-center font-weight-bold mb-0">{{$teacher->teacherAccount->account_no}}</p>
                                    </td>
                                    <td class="align-middle  text-sm">
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $teacher->teacherAccount->balance}}</p>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="transactions" >
                    <div class="container">
                        <form method="post" action="{{route('add-student-class')}}">
                            <div class="row">

                           
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Date <span style="color: red;">*</span></label>
                                    <input type="date" name="tran_date" class="form-control border border-2 p-2" value="{{ now()->format('Y-m-d') }}">

                                    @error('tran_date')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Payment Type <span style="color: red;">*</span></label>
                                    <select name="first_name" class="form-select border border-2 p-2" >
                                        <option value="Debit">Debit</option>
                                        <option value="credit">credit</option>
                                    </select>
                                    @error('first_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Amount <span style="color: red;">*</span></label>
                                    <input type="text" name="first_name" class="form-control border border-2 p-2" value=''>
                                    @error('first_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Description  <span style="color: red;">*</span></label>
                                    <textarea name="description" id="" rows="1" class="form-control border" ></textarea>
                                    @error('first_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                            <input type="hidden" name="class_id" value="{{$teacher->id}}">
                            
                            <button class="btn btn-info col-2 mt-4 	btn-sm" type="submit">New Transaction</button>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header pb-0 p-3  " >
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-3">Transactions</h6>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Account Number</th>
                                    <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Initiated At</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transaction Type</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                                    <!-- <th class="text-secondary opacity-7"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teacher->teacherAccount->transactions as $tran)
                                    <tr>
                                    <td>
                                        <p class="text-xs text-center font-weight-bold mb-0">{{ $tran->account_id }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">@dateFormat($tran->start_date)</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $tran->tran_type}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $tran->amount}}</p>                                      
                                    </td>
                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="payments" >
                    
                    <div class="card">
                        <div class="card-header pb-0 p-3  " >
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-3">Account</h6>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Class Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">End Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fees</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Collected Fee</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remaining Fee</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Student</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Fees</th>
                                    <!-- <th class="text-secondary opacity-7"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teacher->class as $class)
                                    <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                        <!-- <div>
                                            <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                        </div> -->
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">{{$class->class_name}}</h6>
                                        </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">@dateFormat($class->start_date)</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">@dateFormat($class->end_date)</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $class->installment->sum('amount') }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $class->getTotalAmountPaid()}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $class->remainingFee()}}</p>                                      
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $class->totalStudent()}}</p>                                      
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $class->totalFees()}}</p>                                      
                                    </td>
                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="notifications" >
                <div class="card">
                        <div class="card-header pb-0 p-3  " >
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-3">Salary</h6>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pament Of</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Salary Type</th>
                              
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($teacher->employee->salary as $salary)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs">{{ $i++}}</h6>
                                            </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center text-uppercase font-weight-bold mb-0">{{$salary->amount}}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center text-uppercase font-weight-bold mb-0">{{ getMonthName($salary->start_date) }}</p>
                                        </td>
                                        <td class="align-middle  text-center text-uppercase text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{$salary->salary_types->type}}</p>
                                        </td>
                                        </td>
                                        
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-plain h-100 tab-pane show active " id="profile">
                    <div class="card-header pb-0 p-3  " >
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Update Teacher</h6>
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
                        <form method='POST' action="{{ route('teacher-update',['id'=>$teacher->employee->id]) }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">First Name<span style="color: red;">*</span></label>
                                    <input type="text" name="first_name" class="form-control border border-2 p-2" value='{{ $teacher->employee->first_name}}'>
                                    @error('first_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control border border-2 p-2" value='{{ $teacher->employee->last_name }}'>
                                    @error('last_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email <span style="color: red;">*</span></label>
                                    <input type="email" name="email" class="form-control border border-2 p-2" value='{{$teacher->employee->email}}'>
                                    @error('email')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div><div class="mb-3 col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone_no" class="form-control border border-2 p-2" value='{{$teacher->employee->phone_no }}'>
                                    @error('phone')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div><div class="mb-3 col-md-6">
                                    <label class="form-label">Date Of Join <span style="color: red;">*</span></label>
                                    <input type="date" name="date_of_join" class="form-control border border-2 p-2" value='{{$teacher->employee->date_of_join}}'>
                                    @error('date_of_join')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div><div class="mb-3 col-md-6">
                                    <label class="form-label">Date Of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control border border-2 p-2" value='{{$teacher->employee->date_of_birth }}'>
                                    @error('date_of_birth')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Status</label>
                                    <select type="text" name="status" class="form-control border border-2 p-2" value='{{ $teacher->employee->status }}'>
                                        <option value="0"@if($teacher->employee->status == 0) selected @else '' @endif >Active</option>
                                        <option value="1" @if($teacher->employee->status == 1) selected @else '' @endif >Suspend</option>
                                    </select>
                                    @error('status')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Salary Type</label>
                                    <select type="text" name="salary_type" class="form-control border border-2 p-2" value='{{$teacher->employee->salary_type}}'>

                                    @foreach($salary_types as $sal)   
                                    <option value="{{$sal->id}}"  {{ ($teacher->employee->salary_type == $sal->id) ? 'selected' : '' }} >{{$sal->type}}</option>
                                    @endforeach
                                    </select>
                                    @error('salary_type')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Location</label>
                                    <input type="text" name="address" class="form-control border border-2 p-2" value='{{ $teacher->employee->address }}'>
                                    @error('address')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="emp_id" value="{{$teacher->employee->id}}">
                            <button type="submit" class="btn bg-gradient-dark">Submit</button>
                        </form>
                    </div>
                    <p ><span style="color: red;">*</span> Required fields</p>
                </div>
            </div> 
        </div>
    </div>
        <x-footers.auth></x-footers.auth>
</div>
    <x-plugins></x-plugins>

</x-layout>

