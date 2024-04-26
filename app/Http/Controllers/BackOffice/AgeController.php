<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Age;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AgeController extends Controller
{
    public function createAge(Request $request){
        if($request->isMethod("post"))
        {
                $_validator = Validator::make($request->all(),[
                    'debut' => ['required', 'integer', 'min:0'],
                    'fin' => ['required', 'integer', 'min:' . $request->input('debut')],
                ],

                [

                ],
                [
                ]);

            if($_validator->fails())
            {
                  return redirect(route('indexAge'))
                        ->withErrors($_validator)
                        ->withInput()
                        ->with('warning', 'non Enregistrement effectué');

            }

            $succes = false;
            $messageErreur = "L'enregistrement de age a échoué";

            try
            {

                $debut = $request->input('debut');
                $fin = $request->input('fin');

                Age::create([

                    'debut' => $debut,
                    'fin' => $fin,
                    'satut' => 'Actif',
                    'user_id' => Auth::user()->id,
                ]);

                $succes=true;



            }

            catch(\Exception $e)
            {
               $messageErreur = $e->getMessage();
               Log::error($e);

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

    public function indexAge(){
        $ages =  DB::table('ages')
            ->where('statut', '=','Actif')
            // ->orderBy('name', 'asc')
            ->get();
        $age_deletes =  DB::table('ages')
        ->where('statut', '=','Inactif')
        // ->orderBy('name', 'asc')
        ->get();

        return view('backOffice.age.index', compact('ages', 'age_deletes'));
    }

    public function update( Request $request, Age $age){


       $succes = false;
       $messageErreur = "L'enregistrement de age a échoué";

       try
       {
        $debut = $request->input('debut');
        $fin = $request->input('fin');



            $age->debut =  $debut;
            $age->fin =  $fin;
            $age->statut = 'Actif';
            $age->user_id = Auth::user()->id;
            $age->save();
            $succes=true;
       }
       catch(\Exception $e)
       {
          // echo 'VOICI VOTRE ERREUR',  $e->getMessage(), "\n";
          $messageErreur = $e->getMessage();
          Log::error($e);

       }

       if($succes)
       {

                return redirect()->back()->with('success', 'Enregistrement effectué avec succes');
        }


        else
        {
               return redirect()->back()->with("warning", $messageErreur)->withInput();
        }



    }

    public function deleteAge(Request $request, Age $age)
        {
            $age->statut = 'Inactif';
            $age->save();


            return back()->with('success', 'age '.$age->libelle . ' désactivé avec succes');
        }


        public function restoreAge(Request $request, Age $age)
        {
            $age->statut = 'Actif';
            $age->save();


            return back()->with('success', 'age '.$age->libelle . ' désactivé avec succes');

        }
}
