<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class GuestLeadController extends Controller
{
    public function store(Request $request){
       //recuperiamo dati form 
        $form_data = $request->all();

        //andiamo a validare
        $validator = Validator::make($form_data, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);
        //se la validazione fallisce 
        if($validator->fails()){
            return response()->json([
                'success' => false, 
                'errors' => $validator->errors()
            ]);
        }
        //va avanti
        $newContact = new GuestContact();
        $newContact->fill($newContact);

        $newContact->save();

        //INVIAMO MAIL
        Mail::to('hello@example.com')->send(new GuestContact($newContact));

        return response()->json([
            'success' => true
        ]);




    }
}
