<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FormationController extends Controller
{
    public function createFormation(Request $request){

        // dd(session('info_perso')['link']);
        if($request->isMethod("post"))
        {
                $_validator = Validator::make($request->all(),[
                    "libelle"=>"required",
                    // "link" =>"required",
                    "etablissement" => "required",
                    "pays_id"=>"required",
                    "domaine_id"=>"required",
                    "annee_diplome"=>"required",
                    "document"=>"required",
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
                $etablissement = $request->input('etablissement');
                $domaine_id = $request->input('domaine_id');
                $pays_id = $request->input('pays_id');
                $annee_diplome = $request->input('annee_diplome');
                $path = 'null';

                if ($request->hasFile('document')) {
                    $pdfFile = $request->file('document');
                    $path = $pdfFile->store('Formation/Justification', 'public');
                }



             Formation::create([

                'libelle' => $libelle,
                'etablissement' => $etablissement,
                'domaine_id' => $domaine_id,
                'pays_id' => $pays_id,
                'document' => $path,
                'annee_diplome' => $annee_diplome,
                'link'=> session('info_perso')['link'],

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

    public function getFormation($id)
        {
            dd('hi');
            $formation = Formation::findOrFail($id);
            return response()->json($formation);
        }


    public function updateFormation( Request $request, Formation $formation){


        $succes = false;
        $messageErreur = "L'enregistrement de pays a échoué";

        try
        {
            $libelle = $request->input('libelle');
            $etablissement = $request->input('etablissement');
            $domaine_id = $request->input('domaine_id');
            $pays_id = $request->input('pays_id');
            $annee_diplome = $request->input('annee_diplome');

            $formation->libelle=$libelle;
            $formation->etablissement=$etablissement;
            $formation->domaine_id=$domaine_id;
            $formation->pays_id=$pays_id;
            $formation->annee_diplome=$annee_diplome;

            $formation->save();
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

    public function deleteFormation(Request $request, Formation $formation)
        {
            // $formation = Formation::find($id);
            $id = $formation->id;
            $formation = Formation::find($id);
            $formation->delete();

            return redirect()->back();
        }

}
