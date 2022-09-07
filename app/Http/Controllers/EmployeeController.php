<?php

namespace App\Http\Controllers;

use App\Actions\Employees;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
        return Inertia::render('Employees/Edit', compact('employee'));
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

        return redirect('employees')->with([
            'status' => 'success',
            'message' => 'Employee updated successfully',
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

        return redirect('employees')->with([
            'status' => 'success',
            'message' => 'Employee deleted successfully', ]);
    }
}
