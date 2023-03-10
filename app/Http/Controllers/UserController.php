<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $employee = User::whereIn('role_as', ['User'])->get();
        $Sr = 1;
        return view('employees.all-employees', compact('employee','Sr'));
    }

    public function add_employee(){

        return view('employees.add_edit-employee');
    }

    public function edit_employee($id){

        $employee = User::find($id);
        return view('employees.add_edit-employee', compact('employee'));
    }

    public function insert_employee(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$request->id,
            'role_as'=>'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8',
        ]);

        if($employee = User::find($request->id)){
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->password = Hash::make($request->password);
            $employee->role_as = $request->role_as;
            $employee->created_by = Auth::user()->id;
            $employee->update();
            return redirect('/manage-employees')->with('status','Employee Update Successfully');
        }else{
            $employee = New User;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->password = Hash::make($request->password);
            $employee->role_as = $request->role_as;
            $employee->created_by = Auth::user()->id;
            $employee->save();
            return redirect('/manage-employees')->with('status','Employee Added Successfully');
        }
    }

    

    public function delete_employee($id)
    {
        $employee = User::find($id);
        $employee->delete();
        return redirect('/manage-employees')->with('status','Employee Deleted Successfully');
    }
}
