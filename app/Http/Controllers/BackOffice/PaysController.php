<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Pays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PaysController extends Controller
{
    public function createPays(Request $request){
        if($request->isMethod("post"))
        {
                $_validator = Validator::make($request->all(),[
                    "libelle"=>"required|unique:pays,libelle",
                ],

                [

                ],
                [
                    'libelle' => 'nom de pays'
                ]);

            if($_validator->fails())
            {
                  return redirect(route('indexPays'))
                        ->withErrors($_validator)
                        ->withInput()
                        ->with('warning', 'non Enregistrement effectué');

            }

            $succes = false;
            $messageErreur = "L'enregistrement de pays a échoué";

            try
            {

             $libelle = $request->input('libelle');

                Pays::create([

                    'libelle' => ucwords($libelle),
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

    public function indexPays(){
        $payss =  DB::table('pays')
            ->where('statut', '=','Actif')
            // ->orderBy('name', 'asc')
            ->get();
        $pays_deletes =  DB::table('pays')
        ->where('statut', '=','Inactif')
        // ->orderBy('name', 'asc')
        ->get();

        return view('backOffice.pays.index', compact('payss', 'pays_deletes'));
    }

    public function update( Request $request, Pays $pays){


       $succes = false;
       $messageErreur = "L'enregistrement de pays a échoué";

       try
       {
            $libelle = $request->input('libelle');



            $pays->libelle =  ucwords($libelle);
            $pays->statut = 'Actif';
            $pays->user_id = Auth::user()->id;
            $pays->save();
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

    public function deletePays(Request $request, Pays $pays)
        {
            $pays->statut = 'Inactif';
            $pays->save();


            return back()->with('success', 'pays '.$pays->libelle . ' désactivé avec succes');
        }


        public function restorePays(Request $request, Pays $pays)
        {
            $pays->statut = 'Actif';
            $pays->save();


            return back()->with('success', 'pays '.$pays->libelle . ' désactivé avec succes');

        }
}
