<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){

        $data=[];
        
        return view('user.user_list',$data);
    }
    public function create()
    {
        $profile = auth()->user();
        return view('user.create_user',['profile'=>$profile]);
    }

    public function post_user(Request $request){

        $attributes = request()->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|max:20',
            'user_type' => 'required',
        ]);

        $input = $request->input();
        //default password for each users
        $input['password'] = 123456;
        // Create the record
        $user = User::create($input);

        if ($user) {
            // Record created successfully
            return redirect()->back()->with('success', 'User created successfully.');
        } else {
            // Failed to create the record
            return redirect()->back()->with('error', 'Failed to create user.');
        }

    }

    public function update()
    {
            
        // Start a database transaction
    FacadesDB::beginTransaction();

    try {
            $user = request()->user();
            $attributes = request()->validate([
                'email' => 'required|email|unique:users,email,'.$user->id,
                'name' => 'required',
                'phone' => 'required|max:20',
                'about' => 'required:max:255',
                'location' => 'max:255'
            ]);
            if($user->has('first_name'))
                $attributes['first_name']=$user->input('first_name');
            if($user->has('last_name'))
            $attributes['last_name']=$user->input('last_name');
            if($user->has('username'))
            $attributes['username']=$user->input('username');

           
            if ($user->hasFile('document')) {
                if ($user->document()->exists()) {
                    $doc = $user->document()->first();
                    Storage::delete($doc->address);
                } else {
                    $doc = new Document();
                }
            
                // $newProfilePicture = $doc->file('document')->store('public/assets/profile');
                
                $document = $user->file('document');
                $fileName = $user->id . '.' . $document->getClientOriginalExtension();
                $document->move(public_path('assets/profile'), $fileName);
                // Update the user's document path in the database
                $doc->address = 'assets/profile/' . $fileName;
                $doc->name = "Profile Image";
                $doc->save();
                $attributes['document_id'] = $doc->id;
            }
            auth()->user()->update($attributes);
            DB::commit();
            return back()->withStatus('Profile successfully updated.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/users')->with('error', 'Failed to create user');
        }
        
        
    
    }


    public function getUsersData()
    {
        $users = User::select(['id', 'name', 'email', 'phone']);

        return DataTables::of($users)->make(true);
    }
}
