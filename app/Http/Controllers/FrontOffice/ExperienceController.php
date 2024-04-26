<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
            public function createExperience(Request $request){
                // dd(session('info_perso')['link']);
            if($request->isMethod("post"))
            {
                    $_validator = Validator::make($request->all(),[
                        "employeur"=>"required",
                        "fonction" =>"required",
                        "debut" => "required",
                        "fin"=>"required|after:debut",
                        "description"=>"required",
                        "pays_id" => "required",
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

                    $employeur = $request->input('employeur');
                    $fonction = $request->input('fonction');
                    $debut = $request->input('debut');
                    $fin = $request->input('fin');
                    $description = $request->input('description');
                    $pays_id = $request->input('pays_id');


                Experience::create([

                    'employeur' => $employeur,
                    'fonction' => $fonction,
                    'debut' => $debut,
                    'fin' => $fin,
                    'description' => $description,
                    'pays_id' => $pays_id,
                    'link'=> session('info_perso')['link'],

                    ]);
                    $succes=true;



                }

                catch(\Exception $e)
                {
                    // dd(session('info_perso')['link']);

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

            public function deleteExperience(Request $request, Experience $experience)
            {
                    dd('ihi');

                // $formation = Formation::find($id);
                $id = $experience->id;
                $experience = Experience::find($id);
                $experience->delete();

                return redirect()->back();
            }

}
