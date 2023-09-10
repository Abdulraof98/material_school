<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="student"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Update Student '></x-navbars.navs.auth>
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
<span class="ms-1">Pyments</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#notifications" role="tab" aria-selected="false">
<i class="material-icons text-lg position-relative">settings</i>
<span class="ms-1">notifications</span>
</a>
</li>
</ul>
<!-- <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 91px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">-</a></div></ul> -->
</div>
</div>
<style>
    .form-inline .form-group {
      display: inline-block;
      margin-right: 10px;
    }
    
    .form-inline .form-group:last-child {
      margin-right: 0;
    }
    
    .form-inline .form-group label {
      display: inline-block;
      width: 60px;
      text-align: right;
      margin-right: 5px;
    }
    
    .form-inline .form-group input {
      display: inline-block;
      width: 200px;
      padding: 5px;
    }
    
    .form-inline .form-group .btn {
      display: inline-block;
      padding: 5px 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
    }
    .border-info {
     border-color: #007bff;
     border-radius: 4px;
    }
  </style>
      <div class="tab-content">
                <div class="tab-pane fade" id="payments" >
                    <h5>Student Installment</h5>
                    <div class="container mt-4">
                        @foreach($student->class_student as $cs)
                        <div class="card bg-light mb-4">
                            <div class="card-body ">
                                <h6>Class:  {{$cs->class->class_name}}</h6> 
                                @foreach($cs->class->installment as $installment)
                                            
                                   <div class="row mb-3 py-3 text-white bg-info rounded">
                                        <div class="col-4">
                                            <strong>Installment Amount:</strong> {{$installment->amount}}
                                        </div>
                                        <div class="col-4">
                                            <strong>Start Date:</strong> @dateFormat($installment->start_date)
                                        </div>
                                        <div class="col-4">
                                            <strong>Deadline:</strong> @dateFormat($installment->deadline)
                                        </div>
                                    </div>

                                @php    $paidAmount = 0; $offer_applied=0; @endphp
                                
                                @foreach($student->payment_histories($installment->id) as $history)
                                            <div class="row mb-3  text-white col-8 ">
                                                @if($history->offer_applied <= 0)
                                                <div class="rounded-start col-6 bg-success ">
                                                    <strong>Paid Amount:</strong> {{$history->amount}}
                                                </div>
                                                <div class="col-6 bg-success text-end  rounded-end">
                                                    <strong>Date:</strong> @dateFormat($history->date)
                                                </div>
                                                @else
                                                <div class="rounded-start col-4 bg-success ">
                                                    <strong>Paid Amount:</strong> {{$history->amount}}
                                                </div>
                                                <div class="col-4 bg-success text-center ">
                                                    <strong>Offer Applied:</strong> {{$history->offer_applied}}
                                                </div>
                                                <div class="col-4 bg-success text-end rounded-end">
                                                    <strong>Date:</strong> @dateFormat($history->date)
                                                </div>
                                               
                                                @endif
                                            </div>
                                            @php   
                                            $paidAmount += $history->amount; 
                                            $offer_applied+=$history->offer_applied;
                                            @endphp
                                            
                                            @endforeach
                                            @php
                                                $remaining_amount = $installment->amount - ($paidAmount + $offer_applied);
                                            @endphp
                                            @if($remaining_amount != 0)
                                            <div class="row mb-3  text-white col-8">
                                                <div class="col-6 bg-warning rounded-start">
                                                    <strong>Remaining Amount: </strong> {{ $remaining_amount }}
                                                </div>
                                                <div class="col-6 bg-warning text-end rounded-end">
                                                    <strong>Last Date:</strong> @dateFormat($installment->deadline)
                                                </div>
                                            </div>
                                <form id="" class="form-inline form-row align-items-center" action ="{{route('apply-installment')}}" method="post">
                                    @csrf    
                                <div class="form-group mx-sm-3 mb-2">
                                    <label class="sr-only">Payment Date</label>
                                    <input type="date" class="border-info" name="payment_date" value="{{ now()->format('Y-m-d') }}" required>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                    <label class="sr-only">Amount</label>
                                    <input type="text" class=" border-info" name="amount" placeholder="Amount" required>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                    <label class="sr-only">Offer</label>
                                    <input type="text" class=" border-info"  name="offer" placeholder="Offer" required>
                                    <input type="hidden"  name="installment_id" value="{{$installment->id}}">
                                    <input type="hidden"  name="student_id" value="{{$student->id}}">
                                    <input type="hidden"  name="repay" value="{{$remaining_amount}}">
                                    </div>
                                    <button type="submit" class="btn btn-success mt-2"data-repay="{{$remaining_amount}}" data-id="" >Pay</button>

                                </form>
                                @endif
                            
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                        
                    </div>
                </div>

                <div class="tab-pane fade" id="notifications" >
                    <p>notifications</p>
                </div>
                
                <div class="card card-plain h-100 tab-pane show active " id="profile">
                    <div class="card-header pb-0 p-3  " >
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Update Student</h6>
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
                        <form method='POST' action="{{ route('student') }}">
                            @csrf
                            <div class="row">
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">First Name <span style="color: red;">*</span></label>
                                    <input type="text" name="first_name" class="form-control border border-2 p-2" value='{{$student->first_name}}'>
                                    @error('first_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control border border-2 p-2" value='{{$student->last_name}}'>
                                    @error('last_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Gender <span style="color: red;">*</span></label>
                                    <select type="date" name="gender" class="form-select border border-2 p-2" value="{{$student->gender}}">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('gender')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Date of Birth <span style="color: red;">*</span></label>
                                    <input type="date" name="date_of_birth" class="form-control border border-2 p-2" value="{{$student->date_of_birth}}">
                                    @error('date_of_birth')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Date of Join <span style="color: red;">*</span></label>
                                    <input type="date" name="date_of_join" class="form-control border border-2 p-2" value="{{$student->date_of_join}}">
                                    @error('date_of_join')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Starting Class</label>
                                    <select name="class_id" id="class_id" class="form-select border border-2 p-2">
                                    @foreach($classes as $class)   
                                    <option value="{{$class->id}}" {{ $student->class_id === $class->id ? 'selected' : '' }}>{{$class->class_name}}</option>
                             
                                    @endforeach
                                    </select>
                                    <!-- <input type="date" name="starting_class" class="form-control border border-2 p-2" value="{{ old('starting_class') }}"> -->
                                    @error('starting_class')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Family Phone No <span style="color: red;">*</span></label>
                                    <input type="text" name="family_phone_no" class="form-control border border-2 p-2" value='{{ $student->family_phone_no }}'>
                                    @error('family_phone_no')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Status</label>
                                    <select type="date" name="status" class="form-select border border-2 p-2" value='{{ $student->status}}'>
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
                                        rows="4" cols="50">{{ $student->address}}</textarea>
                                        @error('address')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
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
// function applyInstallment(event) {
//   event.preventDefault(); // Prevent form submission

//   // Get the necessary data from the clicked button's parent row
//   var button = event.target;
//   var formId = button.getAttribute('data-id');
//   console.log(formId);
//   var formRow = button.closest('.form-row');
//   var installmentData = {
//     // period: formRow.querySelector('.form-control.period').value,
//     amount: formRow.querySelector('.form-control.amount').value,
//     payment_date: formRow.querySelector('.form-control.payment_date').value,
//     offer: formRow.querySelector('.form-control.offer').value
//   };

//   // Send an AJAX request to the Laravel controller
//   var csrf_token = $('meta[name="csrf-token"]').attr('content');
//   $.ajax({
//     url: '/apply-installment',
//     headers: {'X-CSRF-TOKEN': csrf_token},
//     method: 'POST',
//     data: installmentData,
//     success: function(response) {
//       // Update the card with the new row
//       console.log(response)
//       var payment_date = response.payment_date;
//         var amount = response.amount;
//         var offer = response.offer;
        
//         var newRow =
//         '<div class="row success-row lert alert-success alert-dismissible text-white mb-3">' +
//         '<div class="col">' + amount + '</div>' +
//         '<div class="col">' + payment_date + '</div>' +
//         '<div class="col">' + offer + '</div>' +
//         '<div class="col">Paid </div>'+
//         '</div>';
        
//         // var formRow = button.getElementById('salam');
//         const formRow = document.getElementById("ajax_content");
//     // Append the new row above the form row
//     formRow.insertAdjacentHTML('afterend', newRow)
//     // formRow.innerHTML=$.parseHTML(newRow)
//     },
//     error: function(error) {
//       console.log(error);
//     }
//   });
// }
</script>
