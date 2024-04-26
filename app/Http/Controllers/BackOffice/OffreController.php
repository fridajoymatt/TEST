<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OffreController extends Controller
{
    public function createOffre(Request $request){


        if($request->isMethod("post"))
        {
                $_validator = Validator::make($request->all(),[
                    "libelle"=>"required",
                    'reference'=>"required|unique:offres",
                    'experience'=>"required",
                    'details'=>"required",
                    'date_limite'=>"required",
                    'heure_limite'=>"required",
                    'age_id'=>"required",
                    'niveau_etudes_id'=>"required",
                    'domaine_id'=>"required",
                    'resume'=>"required",

                ],

                [

                ],
                [
                ]);

            if($_validator->fails())
            {
                  return redirect(route('indexOffre'))
                        ->withErrors($_validator)
                        ->withInput()
                        ->with('warning', 'non Enregistrement effectué');

            }

            $succes = false;
            $messageErreur = "L'enregistrement de offre a échoué";

            try
            {

                $libelle = $request->input('libelle');
                $reference = $request->input('reference');
                $experience = $request->input('experience');
                $details = $request->input('details');
                $resume = $request->input('resume');
                $path = 'null';

                if ($request->hasFile('pdfFile')) {
                    $pdfFile = $request->file('pdfFile');
                    $path = $pdfFile->store('Offre/pdfFile', 'public');
                }


                $pdfFile = $path;
                $date_limite = $request->input('date_limite');
                $heure_limite = $request->input('heure_limite');
                $niveau_etudes_id = $request->input('niveau_etudes_id');
                $domaine_id = $request->input('domaine_id');
                $age_id = $request->input('age_id');

                $offre = Offre::create([

                    'libelle' => ucwords($libelle),
                    'reference'=>$reference,
                    'age_id'=>$age_id,
                    'experience'=>$experience,
                    'resume'=>$resume,
                    'details'=>$details,
                    'pdfFile'=>$pdfFile,
                    'date_limite'=>$date_limite,
                    'heure_limite'=>$heure_limite,
                    'satut' => 'Actif',
                    'user_id' => Auth::user()->id,
                    'niveau_etudes_id'=>$niveau_etudes_id,
                    'domaine_id'=>$domaine_id,
                ]);

                if ($request->has('domaines')) {
                    $offre->domaines()->attach($request->domaines);
                }
                if ($request->has('niveau_etudes')) {
                    $offre->niveau_etudes()->attach($request->niveau_etudes);
                }

                if ($request->has('ages')) {
                    $offre->ages()->attach($request->ages);
                }

                if ($request->has('pays')) {
                    $offre->pays()->attach($request->pays);
                }

                $succes=true;




            }

            catch(\Exception $e)
            {
               $messageErreur = $e->getMessage();
               Log::error($e);
            //    dd($messageErreur);

            }



            if($succes){

                return redirect()->back()->with('success', 'Enregistrement effectué avec succes');
                }


            else
            {
                return redirect()->back()->with("warning", $messageErreur)->withInput();
            }

        }

        return view('backOffice.offre.index', compact('domaines','niveaux','ages', 'pays'));
    }

    public function indexOffre(){
        $offres =  DB::table('offres')
            ->where('statut', '=','Actif')
            // ->orderBy('name', 'asc')
            ->get();
        $offre_deletes =  DB::table('offres')
        ->where('statut', '=','Inactif')
        // ->orderBy('name', 'asc')
        ->get();

        $domaines =  DB::table('domaines')
        ->where('statut', '=','Actif')
        ->get();

        $pays =  DB::table('pays')
        ->where('statut', '=','Actif')
        ->get();

        $niveaux =  DB::table('niveau_etudes')
        ->where('statut', '=','Actif')
        ->get();


        $ages =  DB::table('ages')
        ->where('statut', '=','Actif')
        ->get();

        return view('backOffice.offre.index', compact('offres', 'offre_deletes','domaines','niveaux','ages','pays'));
    }

    public function update( Request $request, Offre $offre){


       $succes = false;
       $messageErreur = "L'enregistrement de offre a échoué";

       try
       {
            $libelle = $request->input('libelle');



            $offre->libelle =  ucwords($libelle);
            $offre->statut = 'Actif';
            $offre->user_id = Auth::user()->id;
            $offre->save();
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

    public function deleteOffre(Request $request, Offre $offre)
        {
            $offre->statut = 'Inactif';
            $offre->save();


            return back()->with('success', 'offre '.$offre->libelle . ' désactivé avec succes');
        }


        public function restoreOffre(Request $request, Offre $offre)
        {
            $offre->statut = 'Actif';
            $offre->save();


            return back()->with('success', 'offre '.$offre->libelle . ' désactivé avec succes');

        }
}
