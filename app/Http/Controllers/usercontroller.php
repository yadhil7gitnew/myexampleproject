<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use storage\app\images;
use Illuminate\Support\Facades\File; // Import File facade to work with files
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class usercontroller extends Controller
{
    //CREATE
    public function create(){
        return view('create_user');
    }

    //STORE
    public function store(Request $request)
        {

       $request->validate([
            'name' => 'required|string',
            'age'  => 'required|numeric|max:99',
            'phone'=> 'required|digits:10',
            'email'=> 'required|ends_with:.com',
            'image'=> 'required|image|max:2048',
            'department' => 'required|in:1,2,3,4',
             ]);

     //STORE

            $data = $request->only(['name', 'age', 'phone', 'email','department']);

            // Validate and store the image
            $user = new User();
            $user->name = $request->input('name');
            $user->age = $request->input('age');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->department = $request->input('department');

            // Validate and store the image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'zaaroz_' . Str::random(4) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/images', $imageName);
                $user->image = 'images/' . $imageName;
            }

            $user->save(); // Save the user to the database

            return 'New User Has Been Registered! and User ID is ' . $user->id;


        }

    //LIST
        public function list(){
        $users =user::select('id','name','age','phone','email','department','image')->get();
        // dd($users);
        return view ('list_user',['users'=>$users]);
         }

    //EDIT
        public function edit($id){
        $user=user::find($id);
        return view('edit_user',['user'=>$user]);
        }

    //UPDATE
        public function update(Request $request,$id){
        $user=user::find($id);
        $user->name = $request->input('name');
        $user->age = $request->input('age');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->department = $request->input('department');
        if ($request->hasFile('image'))
        if ($user->image && Storage::exists($user->image)) {
            Storage::delete($user->image);
        }
        $imagePath = $request->file('image')->store('public/images');
        $user->image = str_replace('public/', '', $imagePath);
         $user->save();
        return 'User updated successfully! <a href="' . url('list') . '">Click here</a> to see the list.';
         }

    //DELETE
        public function delete($id){
        $user=user::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
        }
        }


