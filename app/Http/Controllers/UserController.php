<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Symfony\Cmponents\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\Employee;


class UserController extends Controller
{
    
    public function index()
    {
        return response()->json([
            'users'=>User::latest()->get(),
        ]);
    }
    public function get_employeelist(){
        $get_employees=Http::get('http://dummy.restapiexample.com/api/v1/employees');
        $data = json_decode($get_employees->getbody(),true);
        //dd($data);
        /*
        foreach($data as $datas){
            Employee::create([
            'Name' => $datas[1],
            'age' => $datas[3],
            ]);
           
           
        }
        */
        
       


        
        return $get_employees;

        

    }
}
