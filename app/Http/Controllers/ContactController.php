<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Kyc;


class ContactController extends Controller
{
    
    public function create()
    {
        return view('contact-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required',
             'email'          => 'required|email',
             'subject'        => 'required',
             'mobile_number'  => 'required|numeric',
             'message'        => 'required',
        ]);
        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'mobile_number'=>$request->mobile_number,
            'message'=>$request->message
        ]);
        return response()->json(['sucess'=>'Form submitted successful']);

    }
    public function getkycform()
    {
        return view('kyc-form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'f_name'=>'required',
            'm_name'=>'required',
            'l_name'=>'required',
            'id_number'=>'required'
            
        ]);
        kyc::create([
            'f_name'=>$request->f_name,
            'm_name'=>$request->m_name,
            'l_name'=>$request->l_name,
            'id_number'=>$request->id_number        
        ]);
        return response()->json(['sucess'=>'Form submitted successful']);



    }

    public function getkycdata()    {
        $data=Kyc::all();
        return view('getkyc',['data'=>$data]);
    }

    public function getindividualdata($id)
    {
        $data=Kyc::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Kyc::find(['id' => $request->book_id]);

        ['f_name' => $request->f_name, 'm_name' => $request->m_name,'l_name' => $request->l_name,'id_number' => $request->id_number];
        return response()->json(['success'=>'kyc saved successfully.']);

       

    }
    
            
   
}
