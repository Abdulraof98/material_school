<?php

namespace App\Http\Controllers;

use App\Models\Class_Student;
use App\Models\Classes;
use App\Models\SalaryType;
use App\Models\Teacher;
use App\Models\Employee;
use App\Models\Transaction;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {
        $data=[];
        $data['teachers'] = Teacher::all();
        return view('teacher.teacher_list',$data);
    }

    public function create(){

        
        $teachers = Teacher::all();
        return view('teacher.create_teacher',compact('teachers'));
    }

    public function post_teacher(Request $request){
       
        $rules = [
            'emp_id' => 'required',
        ];
        $request->validate($rules);

        DB::beginTransaction();  
        try {
            $input=$request->input();
        
            Teacher::create($input);
            DB::commit();
            return redirect()->back()->with('success', 'Teacher form submitted successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('db_error', 'Failed to create Class');
        }
        
   
    }

    public function teacher_profile($id=null){
        $data=[];
        $data['salary_types'] = SalaryType::all();
        $data['teacher']=Teacher::where('emp_id',$id)->first();
        // $data['classes']=Classes::where()
        return view('teacher.teacher_profile',$data);

    }
    public function update_teacher(Request $request, $id=null){
       
        $rules = [
            'first_name' => 'required|string',
            'date_of_join' => 'required|date',
            'email' => 'required|email|unique:employees',
        ];
        $emp = Employee::find($id);
        if($emp){
            $emp->first_name = $request->input('first_name');
            $emp->last_name = $request->input('last_name');
            $emp->email = $request->input('email');
            $emp->phone_no = $request->input('phone_no');
            $emp->date_of_join = $request->input('date_of_join');
            $emp->date_of_birth = $request->input('date_of_birth');
            $emp->salary_type = $request->input('salary_type');
            $emp->address = $request->input('address');
            $emp->document_id = $request->input('document_id');
            $emp->status = $request->input('status');
            $emp->save();

            return redirect()->route('teacher-profile', ['id' => $id])->with('success', 'Teacher Updated Successfully');

        }
        
    }
    public function transaction(Request $r, $id){
        $input = $r->input();
        if(Transaction::create($input)){

            return redirect()->route('teacher-profile', ['id' => $id])->with('success', 'Transaction updated Successfully');
        }
    }

    public function getTeacherData(){
        $teachers = Teacher::select('teachers.id', 'employees.first_name', 'employees.email', 'employees.phone_no', 'employees.created_at')
    ->join('employees', 'teachers.emp_id', '=', 'employees.id');
        return DataTables::of($teachers)->make(true);
    }
}
