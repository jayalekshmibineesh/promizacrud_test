<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
      return view('index');  
    }
    public function index1()
    {
      return view('index1');  
    }
   

    public function admin_login()
    {
        return view('admin_login');
    }
    // public function showlogin(Request $request)
    // {  
    //     $credentials=$request->only('email','password');
    //     if(Auth::attempt($credentials))
    //        {
    //         $request->session()->regenerate();
    //         return redirect()->route('admin_home');
    //        }
    //        return back()->withErrors([
    //         'email'=>'the provided credentials do not match',
    //     ]);
    // }
    public function adminlogin(Request $request)
    {
      $credentials=$request->only('email','password');
        if(Auth::attempt($credentials))
        {
        $request->session()->regenerate();
        return redirect()->route('admin_home');
        }
        return back()->withErrors([
            'email'=>'the provided credentials do not match'
        ]);
    }
    public function admin_home()
    {
       return view('admin_home') ;
    }
    public function register()
    {
        return view('register');
    }
    public function registration(Request $request)
   {
     $request->validate([
     'firstname'=>'required',
     'lastname'=>'required',
     'email'=>'required',
     'company'=>'required',
     'phone'=>'required',
     
    ]);
    $data=$request->all();
    
    Employee::create($data);
    
    return redirect()->route('register')->with('success',' User registered successfully');
  }
  public function edit($id)
  {
    $data=Employee::find($id);
    return view('edit',compact('data'));

  }
  public function update(Request $request,$id)
  {
    $data = Employee::find($id);
    $request->validate([
       'email'=>'required',
    ]);
   $data->firstname=$request->input('firstname');
   $data->lastname=$request->input('lastname');
   $data->phone=$request->input('phone');
   $data->company=$request->input('company');
   $data->email=$request->input('email');
  
    $data->update();
    return redirect()->route('view');
   }
   public function delete($id)
   {
    Employee::find($id)->delete();
    return redirect()->route('view');
   }
   public function view()
   {
    $data=Employee::all();
    return view('view',compact('data'));
   }
}