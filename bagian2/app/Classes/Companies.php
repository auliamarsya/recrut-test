<?php

namespace App\Classes;

use App\Companies as AppCompanies;
use Exception;

class Companies{
    public function __construct()
    {
        return "construct function was initialized.";
    }

    function create($name, $email, $logo, $website)
    {
        try{
            $imageName = time().'.'.$logo->extension();
            $logo->storeAs('company', $imageName);

            AppCompanies::insert([
                'name' => $name,
                'email' => $email,
                'logo' => $imageName,
                'website' => $website
            ]);

            return 'success';
        } catch (Exception $e){
            return  $e->getMessage();
        }
    }

    function update($id, $name, $email, $logo, $website){
        try{
            $imageName = time().'.'.$logo->extension();
            $logo->storeAs('company', $imageName);

            AppCompanies::where('id', $id)
                        ->update([
                            'name' => $name,
                            'email' => $email,
                            'logo' => $imageName,
                            'website' => $website
                        ]);
            return 'success';
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    function delete($id)
    {
        try{
            AppCompanies::where('id', $id)->delete();

            return 'success';
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    function getCompany($id){
        try{
            $company = AppCompanies::where('id', $id)->first();

            return $company;
        } catch(Exception $e){
            return $e->getMessage();
        }
    }
}