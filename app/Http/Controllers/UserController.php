<?php

namespace App\Http\Controllers;
use App\Models\userDetails;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function viewUser(){
         $user = userDetails::OrderBy('created_at', 'DESC')->get();
        return view('Backend.user.show', compact('user'));
       }
   
    public function store(Request $request){
        $request->validate([
            'image'=>'required',
            'email'=>'required',
            'joiningDate' =>'required',
            'name' =>'required',   
            'terminationDate' => 'after:joiningDate',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $image->move('Uploads/', $imageName);
        }
        UserDetails::create([
            'image' =>'Uploads/'. $imageName,
            'name' => $request->name,
            'email' =>$request->email,
            'joiningDate'=>$request->joiningDate,
            'terminationDate' =>$request->terminationDate,

        ]);
        return redirect()->route('viewUser')->with('success', 'You have successfully added');
    }


    public function delete($id)
    {
        UserDetails::find($id)->delete();
        return redirect()->route('viewUser')->with([
            'success' => 'Deleted successfully'
        ]);
    }
}