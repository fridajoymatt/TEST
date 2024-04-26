<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LangueController extends Controller
{
    public function createLangue(Request $request){

        // dd(session('info_perso')['link']);
        if($request->isMethod("post"))
        {
                $_validator = Validator::make($request->all(),[
                    "libelle"=>"required",
                    // "link" =>"required",
                    "niveau"=>"required",
                ],

                [

                ],
                [
                ]);

            if($_validator->fails())
            {
                  return redirect()->back()
                        ->withErrors($_validator)
                        ->withInput()
                        ->with('warning', 'non Enregistrement effectué');

            }

            $succes = false;
            $messageErreur = "L'enregistrement de formation a échoué";

            try
            {

                $libelle = $request->input('libelle');
                $niveau = $request->input('niveau');

             Langue::create([

                'libelle' => $libelle,
                'niveau' => $niveau,
                'link'=> session('info_perso')['link'],

                ]);

                $succes=true;


            }

            catch(\Exception $e)
            {
               $messageErreur = $e->getMessage();
               Log::error($e);
               dd($messageErreur);


            }



            if($succes){

                return redirect()->back()->with('success', 'Enregistrement effectué avec succes');
                }


            else
            {
                return redirect()->back()->with("warning", $messageErreur)->withInput();
            }

        }
    }

    public function deleteLangue(Request $request, Langue $langue)
        {
            // $formation = Formation::find($id);
            $id = $langue->id;
            $langue = Langue::find($id);
            $langue->delete();

            return redirect()->back();
        }
}
