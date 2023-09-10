<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use DataTables;
class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.subject_list',['subjects'=>$subjects]);
    }

    public function create(){
        
        $data =[];
        return view('subject.create_subject',$data);
    }

    public function post_subject(Request $request){

        $r = request()->validate([
            'subject_name' => 'required|string',
            'fees' => 'required|integer',
            'status' => 'required',
        ]);
        $input = $request->input();
        // Create the record
        $user = Subject::create($input);

        if ($user) {
            // Record created successfully
            return redirect()->back()->with('success', 'Student created successfully.');
        } else {
            // Failed to create the record
            return redirect()->back()->with('error', 'Failed to create user.');
        }

    }

    public function getSubjectsData(){

        $subjects = Subject::select(['id', 'subject_name', 'fees', 'status']);

        return DataTables::of($subjects)->make(true);
    }
}
