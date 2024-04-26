<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Niveau_etude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NiveauController extends Controller
{
    public function createNiveau(Request $request){
        if($request->isMethod("post"))
        {
                $_validator = Validator::make($request->all(),[
                    "libelle"=>"required|unique:niveau_etudes,libelle",
                ],

                [

                ],
                [
                    'libelle' => 'nom de niveau'
                ]);

            if($_validator->fails())
            {
                  return redirect(route('indexNiveau'))
                        ->withErrors($_validator)
                        ->withInput()
                        ->with('warning', 'non Enregistrement effectué');

            }

            $succes = false;
            $messageErreur = "L'enregistrement de niveau a échoué";

            try
            {

             $libelle = $request->input('libelle');

                Niveau_etude::create([

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

    public function indexNiveau(){
        $niveaux =  DB::table('niveau_etudes')
            ->where('statut', '=','Actif')
            // ->orderBy('name', 'asc')
            ->get();
        $niveaux_deletes =  DB::table('niveau_etudes')
        ->where('statut', '=','Inactif')
        // ->orderBy('name', 'asc')
        ->get();

        return view('backOffice.niveauEtude.index', compact('niveaux', 'niveaux_deletes'));
    }

    public function update( Request $request, Niveau_etude $niveau){


       $succes = false;
       $messageErreur = "L'enregistrement de niveau a échoué";

       try
       {
            $libelle = $request->input('libelle');



            $niveau->libelle =  ucwords($libelle);
            $niveau->statut = 'Actif';
            $niveau->user_id = Auth::user()->id;
            $niveau->save();
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

    public function deleteNiveau(Request $request, Niveau_etude $niveau)
        {
            $niveau->statut = 'Inactif';
            $niveau->save();


            return back()->with('success', 'niveau '.$niveau->libelle . ' désactivé avec succes');
        }


        public function restoreNiveau(Request $request, Niveau_etude $niveau)
        {
            $niveau->statut = 'Actif';
            $niveau->save();


            return back()->with('success', 'niveau '.$niveau->libelle . ' désactivé avec succes');

        }
}
