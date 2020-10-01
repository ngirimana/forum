<?php

namespace App\Http\Controllers;
use App\Mail\CustomerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    
    //
    public function sendEmail(Request $request){

        //validator
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);

        $data=array(
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        );
        Mail::to('chadrackngirimana@gmail.com')->cc($request->email)->send(new CustomerMail($data));
        return back()->with('success','Thank you for contact us');
    }
}
