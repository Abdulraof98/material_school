<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Employee;
use App\Models\PaymentHistory;
use App\Models\Student;
class DashboardController extends Controller
{
    public function index()
    {

        $data =[];
        $data['total_student'] = Student::where('status', '<>',2)->count();
        $data['total_income'] =  PaymentHistory::sum('amount');
        $data['total_employee'] = Employee::count();
        $data['total_class'] = Classes::count();
        return view('dashboard.index',$data);


    }
}
