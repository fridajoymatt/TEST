<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\ContactMailRecap;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request){

        // dd('hi');
        $messageErreurmail = 'Vous êtes hors connexion, veuillez vous connecter s\'il vous plait';
        $succes_mail=false;

        try {




            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            // dd($data);


            Mail::to('fridajkp@gmail.com')->send(new ContactMail($data));
            Mail::to($data['email'])->send(new ContactMailRecap($data));


            $succes_mail=true;


        }

        catch (\Exception $ex) {
            $messageErreurmail = $ex->getMessage();
            Log::error($ex);
            $succes_mail=false;
        }

        if($succes_mail){

            return redirect(route('contact'))->with('success', 'Formulaire envoyé avec succès');



        }

        else{

            // dd('echec');
            return redirect(route('contact'))->with('warning', $messageErreurmail);

        }


    }
}
