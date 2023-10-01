<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(){
        //echo "index method works";
        $employees = Employee::orderBy("id","DESC")->paginate(5);
        return view('employee.index',['employees' => $employees]);
    }

    public function create(){
        //echo "create method works";
        return view('employee.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
        ]);

        if( $validator -> passes() ){

            $employee = new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->department = $request->department;

            $employee->save();

            return redirect()->route('employees.index');
        }
        else{
            return redirect()->route('employees.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(Employee $employee) {
        //$employee = Employee::findOrFail($id);       
        return view('employee.edit',['employee' => $employee]);
    }
    public function update(Employee $employee, Request $request) {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',            
        ]);

        if ( $validator->passes() ) {
            // Save data here
            // $employee = Employee::find($id);
            // $employee->name = $request->name;
            // $employee->email = $request->email;
            // $employee->address = $request->address;
            // $employee->save();

            $employee->fill($request->post())->save();

            // Upload image here
            // if ($request->image) {
            //     $oldImage = $employee->image;

            //     $ext = $request->image->getClientOriginalExtension();
            //     $newFileName = time().'.'.$ext;
            //     $request->image->move(public_path().'/uploads/employees/',$newFileName); // This will save file in a folder
                
            //     $employee->image = $newFileName;
            //     $employee->save();

            //     File::delete(public_path().'/uploads/employees/'.$oldImage);
            // }            

            return redirect()->route('employees.index')->with('success','Employee updated successfully.');
        } else {
            // return with errrors
            return redirect()->route('employees.edit',$employee->id)->withErrors($validator)->withInput();
        }
    }
    public function destroy(Employee $employee, Request $request) {
        //$employee = Employee::findOrFail($id);                
        //File::delete(public_path().'/uploads/employees/'.$employee->image);
        $employee->delete();        
        return redirect()->route('employees.index')->with('success','Employee deleted successfully.');
    }
}
