<?php

namespace App\Http\Controllers;

use App\Actions\Employees;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource ;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return EmployeeCollection::collection($request->user()->employees);
        return Inertia::render('Employees/Index', ['employees' => EmployeeResource::collection($request->user()->employees)]);        
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
    public function store(EmployeeRequest $request, Employees\CreateEmployee $creator)
    {
        $creator->create($request->user(), $request->all());
        return redirect('employees')->with([
            'status' => 'success',
            'message' => 'Employee added successfully',
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
        return Inertia::render('Employees/Show')->with('employee', new EmployeeResource($employee));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return Inertia::render('Employees/Edit')->with('employee', new EmployeeResource($employee));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employees\UpdateEmployee $updator, Employee $employee)
    {
        $updator->update($employee, $request->all());
        return \Redirect::route('employees.index')->with([
            'status'=>'success',
            'message'=>'employee added successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee, Employees\DestroyEmployee $destroyer)
    {
        $destroyer->destroy($employee);
        return \Redirect::route('employees.index')->with([
            'status'=>'success',
            'message'=>'employee added successfully'
        ]);
    }
}