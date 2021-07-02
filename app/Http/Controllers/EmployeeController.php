<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Designation;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all();
        return view('backend.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designations= Designation::all();
        //return $designations;
        return view('backend.employee.create',compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input = $request->all();
        
        if( $request->hasFile('image'))
            { 
                $img = $request->file('image'); 
                $imageName = time().'.'.$img->getClientOriginalExtension();
                $input['image'] = $imageName;
                $img->move(public_path('images'), $imageName);
            } else {
                $input['image'] = 'please upload the image';
             }
        
        Employee::create($input);
        toastr()->success('Employee  Created', 'System Says');
        return redirect()->route('employee.index');

        // if($request->hasFile('image')){
        //     // return "image received";
        //     $img = Image::make($request->image);
        //     $img->resize(1920,1080)->encode('jpg');
        //     $path = public_path('files/uploads/').time().'.jpg';
        //     $img->save($path);
        //     return "saved";
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('backend.employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $designations= Designation::all();
        //return $employee;
        return view('backend.employee.edit',compact('designations','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //return $request;
        $employee= Employee::find($employee->id);

        $input = $request->all();
        
        if( $request->hasFile('image'))
            { 
                $img = $request->file('image'); 
                $imageName = time().'.'.$img->getClientOriginalExtension();
                $input['image'] = $imageName;
                $img->move(public_path('images'), $imageName);
            } else {
                $input['image'] = 'update photo';
             }
        
             $employee->update($input);
        
        toastr()->success('employee Updated Successfully', 'System Says');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        
        $employee->delete();
        toastr()->success('Employee Deleted Successfully', 'System Says');
        return redirect()->route('employee.index');
    }
}
