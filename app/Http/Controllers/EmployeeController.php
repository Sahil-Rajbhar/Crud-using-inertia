<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

use App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Employees/Index', ['employees' => $request->user()->employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Employees/Create'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        // dd($request->email);
        $data =  $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,',
        ]);
        
        
        $employee = $request->user()->employees()->create($data);

        return redirect('employees')->with([
            'status'=>'Adding employee data',
            'message'=>'Employee added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //   dd($employee->name);
          return Inertia::render('Employees/Show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        // dd($employee->id);
        return Inertia::render('Employees/Edit', compact('employee'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Employee $employee)

    {
             
        $this->validate($request, [           
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$employee->id,                      
        ]);
       
        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('employees')->with([
            'status'=>'Updating employee data',
            'message'=>'Employee updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('employees')->with([
            'status'=>'Deleting employee data',
            'message'=>'Employee deleted successfully',]);    
    }
    
}