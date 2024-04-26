<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DomaineController extends Controller
{
    public function createDomaine(Request $request){
        if($request->isMethod("post"))
        {
                $_validator = Validator::make($request->all(),[
                    "libelle"=>"required|unique:domaines,libelle",
                ],

                [

                ],
                [
                    'libelle' => 'nom de domaine'
                ]);

            if($_validator->fails())
            {
                  return redirect(route('indexDomaine'))
                        ->withErrors($_validator)
                        ->withInput()
                        ->with('warning', 'non Enregistrement effectué');

            }

            $succes = false;
            $messageErreur = "L'enregistrement de domaine a échoué";

            try
            {

             $libelle = $request->input('libelle');

                Domaine::create([

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

    public function indexDomaine(){
        $domaines =  DB::table('domaines')
            ->where('statut', '=','Actif')
            // ->orderBy('name', 'asc')
            ->get();
        $domaines_deletes =  DB::table('domaines')
        ->where('statut', '=','Inactif')
        // ->orderBy('name', 'asc')
        ->get();

            // dd($domaines);
        return view('backOffice.domaine.index', compact('domaines', 'domaines_deletes'));
    }

    public function update( Request $request, Domaine $domaine){

       //dd($domaine, $request->libelle);
       //dd($domaine->domaine_id);

       $succes = false;
       $messageErreur = "L'enregistrement de domaine a échoué";

       try
       {
            $libelle = $request->input('libelle');



            $domaine->libelle =  ucwords($libelle);
            $domaine->statut = 'Actif';
            $domaine->user_id = Auth::user()->id;
            $domaine->save();
        // Domaine::table('domaines')->where( $domaine->libelle)->update(['domaine' => $domaine]);
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

                //       return back()->with("succes", "domaine creé");
                //dd('bonjour');
                return redirect()->back()->with('success', 'Enregistrement effectué avec succes');
        }


        else
        {
               return redirect()->back()->with("warning", $messageErreur)->withInput();
        }



    }

    public function deleteDomaine(Request $request, Domaine $domaine)
        {
            $domaine->statut = 'Inactif';
            $domaine->save();


            return back()->with('success', 'domaine '.$domaine->libelle . ' désactivé avec succes');
        }


        public function restoreDomaine(Request $request, Domaine $domaine)
        {
            $domaine->statut = 'Actif';
            $domaine->save();


            return back()->with('success', 'domaine '.$domaine->libelle . ' désactivé avec succes');

        }

}
