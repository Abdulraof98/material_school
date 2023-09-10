<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="class"></x-navbars.sidebar>
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Class Profile '></x-navbars.navs.auth>
        <!-- End Navbar -->
    <div class="container-fluid px-2 px-md-4">
                <div class="page-header min-height-300 border-radius-xl mt-4"
                    style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                    <span class="mask  bg-gradient-primary  opacity-6"></span>
                </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
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
                    <span class="ms-1">Students</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#notifications" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Payments</span>
                    </a>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="payments" >
                    <div class="container">
                        <form method="post" action="{{route('add-student-class')}}">
                            @csrf
                            <select class="select2 form-control " name="students[]" style="width: 20%;" required>
                                <option value="" ></option>
                                @foreach($other_Students as $student)
                                <option value="{{$student->id}}">{{$student->first_name}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="class_id" value="{{$class->id}}">
                            <button class="btn btn-primary mt-3" type="submit">Add Students</button>
                            <a class="btn btn-info mt-3" type="button" href="{{ route('student', ['class_id' => $class->id]) }}">Add New Students</a>
                        </form>
                    </div>
                    
                    <div class="card">
                        <div class="card-header pb-0 p-3  " >
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-3">Students</h6>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gender</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Join</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fees</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paid Fee</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                                    <!-- <th class="text-secondary opacity-7"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($class->class_student as $sc)
                                    <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                        <!-- <div>
                                            <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                        </div> -->
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">{{$sc->student->first_name}}</h6>
                                        </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$sc->student->gender}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{$sc->student->date_of_join}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $class->installment->sum('amount') }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $sc->student->getTotalAmountPaidForClass($class->id) }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <a href="{{route('update-student',$sc->student->id)}}" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                        </a>
                                        <!-- <span class="badge badge-sm badge-success">{{$sc->student->date_of_join}}</span> -->
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
                                    <h6 class="mb-3">Installments</h6>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Installment Amount</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">End Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Paid</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remaining Fee</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paid Fee </th>
                              
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($class->installment as $installment)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs">{{ $i++}}</h6>
                                            </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center text-uppercase font-weight-bold mb-0">{{$installment->amount}}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center text-uppercase font-weight-bold mb-0">@dateFormat($installment->start_date)</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center text-uppercase font-weight-bold mb-0">@dateFormat($installment->deadline)</p>
                                        </td>
                                        <td class="align-middle  text-center text-uppercase text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{$installment->payment_history->count('student_id')}}</p>
                                        </td>
                                        <td class="align-middle  text-center text-uppercase text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{$installment->singleInstallmentRemainingFee()}}</p>
                                        </td>
                                        <td class="align-middle text-center text-uppercase text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{$installment->payment_history->sum('amount')}}</p>
                                        </td>
                                        
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                    <tr>
                                        <td colspan="5">Total</td>
                                        <td class="align-middle text-center text-sm">
                                            {{$installment->totalSingleInstallmentRemainingFee()}}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{$class->getTotalAmountPaid()}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-plain h-100 tab-pane show active " id="profile">
                    <div class="card-header pb-0 p-3  " >
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Update Class</h6>
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
                        <form method='POST' action="{{ route('class-profile',$class->id) }}">
                            @csrf
                            <div class="row">
                                
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Asign To <span style="color: red;">*</span></label>
                                    <select name="teacher_id" id="teacher_id" class="form-control border border-2 p-2">
                                    @foreach($teachers as $teacher)   
                                    <option value="{{$teacher->id}}" {{ $class->teacher->teacher_id=== $teacher->id ? 'selected' : '' }}>{{$teacher->employee->first_name}}</option>
                                
                                    @endforeach
                                    </select>
                                    @error('teacher_id')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Class Name <span style="color: red;">*</span></label>
                                    <input type="text" name="class_name" class="form-control border border-2 p-2" value='{{$class->class_name }}'>
                                    @error('class_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Start Date <span style="color: red;">*</span></label>
                                    <input type="date" name="start_date" class="form-control border border-2 p-2" value='{{$class->start_date}}'>
                                    @error('start_date')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">End Date</label>
                                    <input type="date" name="end_date" class="form-control border border-2 p-2" value='{{ $class->end_date }}'>
                                    @error('end_date')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    

                                </div><div class="mb-3 col-md-6">
                                    <label class="form-label">Duration</label>
                                    <input type="text" name="duration" class="form-control border border-2 p-2" value='{{ $class->duration }}'>
                                    @error('duration')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div><div class="mb-3 col-md-6">
                                    <label class="form-label">Total Seat</label>
                                    <input type="text" name="total_seat" class="form-control border border-2 p-2" value='{{ $class->total_seat }}'>
                                    @error('total_seat')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <label class="form-label">Installments</label>
                                        <div class="col-md-6 ">
                                            <input type="checkbox" id="terms-checkbox" class="" name ="installment">
                                                <label for="terms-checkbox">All Installments are same for this course</label>
                                            <div id="installments-container">
                                                <!-- Initial installment form -->
                                                <div class="installment-form mb-3">
                                                    <div class="input-group">
                                                        <label for="installment" style= " margin: 5px;"> <h4>1.</h4> </label>
                                                        <input type="date" class="form-control border border-1 p-2 start_date" name="start_date[]" placeholder="Start Date">
                                                        <input type="date" class="form-control border border-1 p-2 deadline" name="deadline[]" placeholder="End Date">
                                                        <input type="text" class="form-control border border-1 p-2" name="amount[]" placeholder="Amount">
                                                        <div class="input-group-append">
                                                        <button id="add-button" class="btn btn-success mb-3" style= " margin: 5px;">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>       
                            </div>
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
<script>

document.querySelectorAll('.form-inline button[type="submit"]').forEach(function(button) {
    button.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent form submission
      var repayAmount = button.getAttribute('data-repay');
      var historyId = button.getAttribute('data-id');
      
      var form = button.closest('form');

        // Get input values within the form
        var date = form.querySelector('input[name="payment_date"]').value;
        var amount = parseInt(form.querySelector('input[name="amount"]').value);
        var amount2 = form.querySelector('input[name="amount"]');
        var offer = parseInt(form.querySelector('input[name="offer"]').value);
        var offer2 = form.querySelector('input[name="offer"]');

        var error = false
        if(amount2.value==='' || offer2.value ===''  ){
            alert("Please fill the inputs")
            return
        }
        if(amount > repayAmount || offer > repayAmount){
            error = true
            return
        }
        if((amount + offer) > repayAmount){
            error = true
            console.log('historyId')
            return
        }
        if(error){
            alert("Please add valid amount");
            return
        }
      // Perform form validation or any other custom logic
      // ...

      form.submit();
    });
  });
</script>
