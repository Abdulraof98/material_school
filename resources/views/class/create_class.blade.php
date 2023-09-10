<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="class"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Create Class '></x-navbars.navs.auth>
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
                                <h6 class="mb-3">Create Class</h6>
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
                        @if (session('db_error'))
                        <div class="row">
                        <div class="alert alert-primary alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('db_error') }} </span>
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
                        <form method='POST' action="{{ route('class') }}">
                            @csrf
                            <div class="row">
                                
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Asign To <span style="color: red;">*</span></label>
                                    <select name="teacher_id" id="teacher_id" class="form-control border border-2 p-2">
                                    @foreach($teachers as $teacher)   
                                    <option value="{{$teacher->id}}" {{ old('teacher_id') === $teacher->id ? 'selected' : '' }}>{{$teacher->employee->first_name}}</option>
                             
                                    @endforeach
                                    </select>
                                    @error('teacher_id')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Class Name <span style="color: red;">*</span></label>
                                    <input type="text" name="class_name" class="form-control border border-2 p-2" value='{{ old('class_name') }}'>
                                    @error('class_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Start Date <span style="color: red;">*</span></label>
                                    <input type="date" name="start_date" class="form-control border border-2 p-2" value='{{ old('start_date') }}'>
                                    @error('start_date')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">End Date</label>
                                    <input type="date" name="end_date" class="form-control border border-2 p-2" value='{{ old('end_date') }}'>
                                    @error('end_date')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    

                                </div><div class="mb-3 col-md-6">
                                    <label class="form-label">Duration</label>
                                    <input type="text" name="duration" class="form-control border border-2 p-2" value='{{ old('duration') }}'>
                                    @error('duration')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div><div class="mb-3 col-md-6">
                                    <label class="form-label">Total Seat</label>
                                    <input type="text" name="total_seat" class="form-control border border-2 p-2" value='{{ old('total_seat') }}'>
                                    @error('total_seat')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <!-- <div class="mb-3 col-md-6">
                                    <label class="form-label">Select Students</label>
                                    <select multiple name="students[]" id="" class="form-control border border-2 p-2" >
                                    @foreach($students as $student)   
                                    <option value="{{$student->id}}">{{$student->first_name}}</option>
                                    @endforeach
                                    </select>            
                                    @error('total_seat')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div> -->
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
                </div>
                <p ><span style="color: red;">*</span> Required fields</p>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
<script>
   document.getElementById('add-button').addEventListener('click', function(event) {
    event.preventDefault();
  var container = document.getElementById('installments-container');
  var form = document.createElement('div');
  form.className = 'installment-form mb-3';

  var installmentCount = container.children.length + 1; // Get the current count of installments
  form.innerHTML = `
    <div class="input-group">
    <label for="installment" style= " margin: 5px;"> <h4>${installmentCount}.</h4> </label>
      <input type="date" class="form-control border border-2 p-2 start_date" name="start_date[]" placeholder="Start Date">
      <input type="date" class="form-control border border-2 p-2 deadline" name="end_date[]" placeholder="End Date">
      <input type="text" class="form-control border border-2 p-2 " name="amount[]" placeholder="Amount">
      <div class="input-group-append">
        <button class="btn btn-danger remove-button" style= " margin: 5px;" type="button">-</button>
      </div>
    </div>
  `;

  // Set the due date value of the next installment based on the previous installment's due date
  if (installmentCount > 1) {
    var previousDueDateInput = 
    container.querySelector('.installment-form:nth-child(' + (installmentCount - 1) + ') .deadline');
    var currentDueDateInput = form.querySelector('.start_date');
    currentDueDateInput.value = previousDueDateInput.value;
  }
  container.appendChild(form);
});

document.addEventListener('change', function(event) {
  if (event.target.classList.contains('deadline')) {
    var currentDueDateInput = event.target;
    var form = currentDueDateInput.closest('.installment-form');
    var nextForm = form.nextElementSibling;
    
    if (nextForm) {
      var nextDueDateInput = nextForm.querySelector('.start_date');
      nextDueDateInput.value = currentDueDateInput.value;
    }
  }
});
document.addEventListener('click', function(event) {
  if (event.target.classList.contains('remove-button')) {
    var button = event.target;
    var form = button.closest('.installment-form');
    var id = button.dataset.id; // Retrieve the data-id attribute value
    if (confirm('Are you sure you want to remove installment ?')) { // Confirmation prompt
      form.remove();
    }
  }
});

    // $(document).ready(function() {
    //   $('.deadline').change(function() {
    //     var startDate = $(this).val();
    //     $(this).closest('tr').next().find('input.start_date').val(startDate);
    //   });
    // });
  
</script>
