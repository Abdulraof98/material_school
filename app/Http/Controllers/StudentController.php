<?php

namespace App\Http\Controllers;

use App\Models\Class_Student;
use App\Models\Classes;
use App\Models\Installment;
use App\Models\PaymentHistory;
use App\Models\Student;
use Illuminate\Http\Request;
use DataTables;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.student_list',['students'=>$students]);
    }

    public function create(Request $request){
        
        $data =[];
        $data['selected_class']=null;
        if($request->GET('class_id')){
            $data['selected_class'] = Classes::where('id',$request->GET('class_id'))->pluck('id')->first();
        }
        // dd($data['selected_class'] );
        $data['classes']= Classes::select('id','class_name')->distinct('class_name')->get();
        return view('student.create_student',$data);
    }

    public function post_student(Request $request){

        $r = request()->validate([
            'first_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'date_of_join' => 'required',
            'family_phone_no' => 'required|max:20',
        ]);
        $input = $request->input();
        // Create the record
        $user = Student::create($input);

        if ($user) {
            // Record created successfully
            return redirect()->route('update-student', $user->id)->with('success', 'Student created successfully.');
        } else {
            // Failed to create the record
            return redirect()->back()->with('error', 'Failed to create user.');
        }

    }

    public function update(int $id){
        // dd($id);
        
        $data =[];
        $data['student'] = Student::find($id);
        $data['class_student']=Class_Student::where('student_id',$data['student']->id)->get();
        $data['classes']= Classes::select('id','class_name')->distinct('class_name')->get();
        return view('student.update_student',$data);
    }

    public function post_installment(Request $request){

        $r = request()->validate([
            'first_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'date_of_join' => 'required',
            'family_phone_no' => 'required|max:20',
            'amount' => 'required',
            'offer' => 'required',
        ]);
        $input = $request->input();
        // Create the record
        $user = Installment::create($input);

        if ($user) {
            // Record created successfully
            return redirect()->back()->with('success', 'Student created successfully.');
        } else {
            // Failed to create the record
            return redirect()->back()->with('error', 'Failed to create user.');
        }

    }

    public function applyInstallment(Request $request){

        $data=[];
        $data['student_id'] = $request['student_id'];
        $data['installment_id'] = $request['installment_id'];
        $data['payment_date'] = $request['payment_date'];
        $data['amount'] = $request->input('amount');
        $data['offer_applied'] = $request->input('offer');
        $data['repay'] = $request->input('repay');
        if(($data['amount']+$data['offer_applied']) > $data['repay']){
            return redirect()->back()->with("error","Payment Failed");
        }
        PaymentHistory::create($data);
        session()->flash('activeTab', 'payments');
        return redirect()->back()->with("success","Installment paid successfully!");
    }

    public function getStudentsData(){

        $students = Student::select(['id', 'first_name', 'gender', 'status', 'date_of_join']);

        return DataTables::of($students)->make(true);
    }

    public function datatable(){

        return view('components.datatable');
    }
}
