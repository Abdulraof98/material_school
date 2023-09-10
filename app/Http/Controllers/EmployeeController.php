<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Employee;
use App\Models\SalaryType;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['employees']= Employee::all();
        return view('employee.emp_list',$data);
    }

    public function create(){
        return view('employee.create_employee');
    }

    public function post_emp(Request $request){
        $rules = [
            'first_name' => 'required|string',
            'date_of_join' => 'required|date',
            'email' => 'required|email|unique:employees',
        ];

        $request->validate($rules);
        $input=$request->input();
        $balance =0.00;
        $emp = Employee::create($input);
        if(isset($input['is_teacher'])){
            Teacher::create(['emp_id'=> $emp->id]);
        }
        if($emp){
            $rand = $this->rand_string(4);
            Account::create(['account_no'=> $rand, 'balance'=>$balance, 'emp_id'=>$emp->id]);
        }
        return Redirect::back()->with('success', 'Form submitted successfully!');
    }

    public function emp_profile($id=null){

        $data = [];
        $data['employee']=Employee::find($id);
        $data['salary_types'] = SalaryType::all();
        return view('employee.employee_profile', $data);
    }

    public function emp_update(Request $request, $id=null){
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

            return redirect()->route('employee-profile', ['id' => $id])->with('success', 'Employee Updated Successfully');

        }
    }

    public function getEmpData(){

        $employees = Employee::select(['id', 'first_name', 'email', 'phone_no', 'created_at']);

        return DataTables::of($employees)->make(true);
    }

    
}
