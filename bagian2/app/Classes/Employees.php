<?php

namespace App\Classes;

use App\Employees as AppEmployees;
use App\Companies as AppCompanies;
use Exception;

class Employees{
    public function __construct()
    {
        return "construct function was initialized.";
    }

    function allEmployees(){
        try{
            $getEmployees = AppEmployees::all();

            foreach($getEmployees as $employee){
                $company = AppCompanies::where('id', $employee->company_id)->first();
                $item[] = [
                    'id' => $employee->id,
                    'name' => $employee->name,
                    'company' => $company['name'],
                    'email' => $employee->email
                ];
            }

            return $item;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    function getEmployee($id){
        try{
            $employee = AppEmployees::where('id', $id)->first();

            return $employee;
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    function create($name, $company_id, $email)
    {
        try{
            AppEmployees::insert([
                'name' => $name,
                'company_id' => $company_id,
                'email' => $email
            ]);

            return 'success';
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    function update($id, $name, $company_id, $email){
        try{
            AppEmployees::where('id', $id)
                        ->update([
                            'name' => $name,
                            'company_id' => $company_id,
                            'email' => $email
                        ]);
            return 'success';
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    function delete($id)
    {
        try{
            AppEmployees::where('id', $id)->delete();

            return 'success';
        } catch(Exception $e){
            return $e->getMessage();
        }
    }
}