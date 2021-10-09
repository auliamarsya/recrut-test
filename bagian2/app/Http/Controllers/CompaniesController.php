<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Companies as AppCompanies;
use App\Companies;
use App\Http\Requests\StoreCompanyRequest;
// use PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::paginate(5);
        return view('companies/listCompany', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies/addCompany');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $validatedData = $request->validated();
        $company = new AppCompanies;
        $create = $company->create($request->company_name, $request->email, $request->file('logo'), $request->website);
        
        return redirect()->route('list.company')->with('success', 'Save Data Successful.');
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
        $company_obj = new AppCompanies;
        $company = $company_obj->getCompany($request->id);
        
        return view('companies/editCompany', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanyRequest $request)
    {
        $validatedData = $request->validated();
        $company = new AppCompanies;
        $update = $company->update($request->id, $request->company_name, $request->email, $request->file('logo'), $request->website);
        
        return redirect()->route('list.company')->with('success', 'Save Data Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $company = new AppCompanies;
        $destroy = $company->delete($request->id);

        return redirect()->route('list.company')->with('success', 'Delete Data Successful.');
    }

    public function exportPDF(Request $request){
        $company_obj = new AppCompanies;
        $employees = $company_obj->getEmployees($request->id);
        $company = $company_obj->getCompany($request->id);

        $pdf = PDF::loadView('companies.employeesPDF', compact('employees', 'company'));
        return $pdf->download(time().'_employees.pdf');
    }
}
