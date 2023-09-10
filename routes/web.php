<?php

use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;

Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('users-data', [UserController::class,'getUsersData']);
	
	
	

	// Route::get('user-profile',[UserController::class, 'create'])->name('user-profile');
	Route::get('user',[UserController::class, 'create'])->name('user');
	Route::post('user',[UserController::class, 'post_user'])->name('user');
	Route::get('user-management',[UserController::class, 'index'])->name('user-management');

	Route::get('student',[StudentController::class, 'create'])->name('student');
	Route::post('student',[StudentController::class, 'post_student'])->name('student');
	
	Route::get('update-student/{id}',[StudentController::class, 'update'])->name('update-student');
	Route::post('subject/',[StudentController::class, 'post_installment'])->name('subject');
	Route::post('apply-installment', [StudentController::class,'applyInstallment'])->name('apply-installment');

	Route::get('student-management',[StudentController::class, 'index'])->name('student-management');
	Route::get('students-data', [StudentController::class,'getStudentsData']);

	Route::get('subject',[SubjectController::class, 'create'])->name('subject');
	Route::post('subject',[SubjectController::class, 'post_subject'])->name('subject');
	Route::get('subject-management',[SubjectController::class, 'index'])->name('subject-management');
	Route::get('subjects-data', [SubjectController::class,'getSubjectsData']);

	Route::get('class',[ClassController::class, 'create'])->name('class');
	Route::post('class',[ClassController::class, 'post_class'])->name('class');
	Route::get('class-profile/{id}',[ClassController::class, 'class_profile'])->name('class-profile');
	Route::post('add-student-class',[ClassController::class, 'add_student'])->name('add-student-class');


	Route::get('class-management',[ClassController::class, 'index'])->name('class-management');
	Route::get('classes-data', [ClassController::class,'getClassesData']);

	Route::get('employee', [EmployeeController::class, 'create'])->name('employee');
	Route::post('employee', [EmployeeController::class, 'post_emp'])->name('employee');
	Route::get('employee-profile/{id}', [EmployeeController::class, 'emp_profile'])->name('employee-profile');
	Route::post('employee-update/{id}', [EmployeeController::class, 'emp_update'])->name('employee-update');
	Route::get('employee-management', [EmployeeController::class, 'index'])->name('employee-management');
	Route::get('employees-data', [EmployeeController::class,'getEmpData']);

	Route::get('teacher', [TeacherController::class, 'create'])->name('teacher');
	Route::post('teacher', [TeacherController::class, 'post_teacher'])->name('teacher');
	Route::get('teacher-profile/{id}', [TeacherController::class, 'teacher_profile'])->name('teacher-profile');
	Route::post('teacher-update/{id}', [TeacherController::class, 'update_teacher'])->name('teacher-update');
	Route::post('transaction/{id}', [TeacherController::class, 'update_teacher'])->name('transaction');
	Route::get('teacher-management', [TeacherController::class, 'index'])->name('teacher-management');
	Route::get('teachers-data', [TeacherController::class,'getTeacherData']);
	

	

	

	
	// Route::get('student', [TeacherController::class, 'index'])->name('student');
	// Route::get('student-management', [StudentController::class, 'index'])->name('student-management');
	Route::get('datatable', [StudentController::class, 'datatable'])->name('datatable');
});