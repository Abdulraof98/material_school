<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){

        $profile = auth()->user();
        return view('user.create_user',['profile'=>$profile]);
    }
    public function create()
    {
        return view('pages.profile');
    }

    public function update()
    {
            
        // Start a database transaction
    DB::beginTransaction();

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
}
