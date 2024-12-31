<?php

namespace App\Http\Controllers;

use App\Mail\Enquiry as MailEnquiry;
use App\Models\Enquiry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        try{
            $validate = Validator::make($request->all(),[
                'name'=>'required|string',
                'email'=>'required|email',
                'message'=>'required'
            ]);
            if($validate->errors() && $validate->messages()->count()>0)
            {
                return response()->json(['status'=>'error','message'=>$validate->messages()]);
            }
            $store = Enquiry::create($request->all());
            $subject = "Enquiry Recieved";
            $message = "New enquiry recieved name: ".$request->name."\n\r Email: ". $request->email . "\n\r Message: ". $request->message;
            $email = 'info@wafinews.com';
            Mail::to($email)->send( new MailEnquiry($subject, $message));
            return response()->json(['status'=>'success','message'=>'Enquiry created successfully']);
        }
        catch(Exception $e)
        {
            dd($e);
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
}
