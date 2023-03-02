<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmployeesController extends Controller
{
    public function index()
    {
        return view('employee.list');
    }
    public function create()
    {
       return view('employee.create');
    }
    public function store(request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'department'=>'required'
        ]);

        if($validator->passes()){
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->department = $request->department;
            $employee->save();

            $request->session()->flash('success','Employee added successfully');

            return redirect()->route('employees.index');
        }
        else{
            return redirect()->route('employees.create')->withErrors($validator)->withInput();
        }
    }
}