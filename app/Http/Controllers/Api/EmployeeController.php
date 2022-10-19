<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee=Employee::all();
        return view("employee.index",["employee"=>$employee]);
        
    }


    
    public function store(Request $request){
        $employee=new Employee; 
        $employee->name=$request->txtName;
        $employee->email=$request->txtEmail;
        $employee->phone=$request->txtPhone;
        $employee->designation=$request->txtDesignation;
        $employee->salary=$request->txtSalary;

        $employee->deleted_at=$request->txtDeleted_at;
        $employee->save();     
        return back()->with('success','Created Successfully.');
          
    }


    public function edit($id){
		$employee=Employee::find($id);
		return response()->json([
			'status'=>200,
			'employee'=>$employee
		]);
	}


    public function update(Request $request,Employee $employee){
        $employeeid=$request->input('cmbEmployeeId');
        $employee = Employee::find($employeeid);
        $employee->id=$request->cmbEmployeeId; 
        $employee->name=$request->txtName;
        $employee->email=$request->txtEmail;
        $employee->phone=$request->txtPhone;
        $employee->designation=$request->txtDesignation;
        $employee->salary=$request->txtSalary;

        $employee->deleted_at=$request->txtDeleted_at;		   
        $employee->update();
        return redirect()->back()
        ->with('success',' Updated successfully');               
    }


    public function destroy(Request $request){  
        $employeeid=$request->input('d_employee');
		$employee= Employee::find($employeeid);
		$employee->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
