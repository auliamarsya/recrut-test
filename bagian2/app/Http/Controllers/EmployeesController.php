<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Employees as AppEmployees;
use App\Companies;
use App\Employees;
use App\Http\Requests\StoreEmployeeRequest;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = new AppEmployees;
        $employees = $employee->allEmployees();
        return view('employees/listEmployee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees/addEmployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validatedData = $request->validated();
        $employee = new AppEmployees;
        $create = $employee->create($request->employee_name, $request->company, $request->email);
        
        return redirect()->route('employee')->with('success', 'Save Data Successful.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $employee_obj = new AppEmployees;
        $employee = $employee_obj->getEmployee($request->id);
        
        return view('employees/editEmployee', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeeRequest $request)
    {
        $validatedData = $request->validated();
        $employee = new AppEmployees;
        $update = $employee->update($request->id, $request->employee_name,  $request->company, $request->email);
        
        return redirect()->route('employee')->with('success', 'Save Data Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employee = new AppEmployees;
        $destroy = $employee->delete($request->id);

        return redirect()->route('employee')->with('success', 'Delete Data Successful.');
    }

    public function getCompanies(Request $request){

        $search = $request->search;
  
        if($search == ''){
           $companies = Companies::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
           $companies = Companies::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($companies as $company){
           $response[] = array(
                "id"=>$company->id,
                "text"=>$company->name
           );
        }
  
        return response()->json($response);
     }

     public function importExcel(Request $request){
        Excel::import(new EmployeesImport, $request->file('file'));
           
        return back();
     }
}
