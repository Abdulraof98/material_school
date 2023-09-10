<?php

namespace App\Http\Controllers;

use App\Models\Class_Student;
use App\Models\Classes;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class ClassController extends Controller
{
    public function index()
    {
        $data = [];
        // $classes = Classes::find(5);
        // $classes = Classes::with('teacher.employee') // Include nested relationships
        // ->select('classes.id', 'classes.class_name', 'classes.status','classes.total_seat')
        // ->get();
        
        // // dd($classes);
        // $data['classes']= Classes::all();
        return view('class.class_list',$data);
    }

    public function create(){

        $data=[];
        $data['teachers'] = Teacher::all();
        $data['students'] = Student::all();
        return view('class.create_class',$data);   
    }

    public function post_class(Request $request){
       
        $rules = [
            'teacher_id' => 'required',
            'class_name' => 'required|string',
            'start_date' => 'required|date',
        ];
        $request->validate($rules);

        DB::beginTransaction();  
        try {
            $input=$request->input();
            $class = Classes::create($input);
            
            DB::commit();
            return redirect()->back()->with('success', 'Form submitted successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('db_error', 'Failed to create Class');
        }
   
    }

    public function class_profile($id=null){

        $data=[];
        $data['teachers'] = Teacher::all();
        $data['students'] = Student::all();
        $data['student'] = Student::find($id);
        $data['other_Students'] =Student::whereDoesntHave('classes', function ($query) use ($id) {
            $query->where('class_id', $id);
        })->get();
        $data['class'] = Classes::find($id);
        return view('class.class_profile',$data);
    }

    public function add_student(Request $request){

        $data =[];
        $data['students']=$request->input('students');
        $data['class_id']=$request->input('class_id');
        foreach($data['students'] as $student_id){
            if(!empty($student_id)){
                $data['student_id']=$student_id;
                Class_Student::create($data);
            }
        }
        session()->flash('success', 'Students are added successfully!');
        return $this->class_profile($data['class_id']);
    }

    public function getClassesData(){

        $classes = Classes::leftJoin('teachers', 'classes.teacher_id', '=', 'teachers.id')
        ->leftJoin('employees', 'teachers.emp_id', '=', 'employees.id')
        ->select('classes.id', 'classes.class_name', 'classes.status', 'classes.total_seat')
        ->get();
        return DataTables::of($classes)
        ->addColumn('teacher_name', function ($class) {
            if ($class->emp_id) {
                return $class->first_name;
            } else {
                return 'No Teacher Assigned';
            }
        })->toJson();

    }
}
