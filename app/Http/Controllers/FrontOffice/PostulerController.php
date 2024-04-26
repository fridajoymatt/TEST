<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Mail\CandidatureMail;
use App\Models\Candidature;
use App\Models\Link;
use App\Models\Offre;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PostulerController extends Controller
{
    public function step1(Request $request, Offre $offre){

        $offre_id_input = $offre->id;

        $offre =  DB::table('offres')
        ->where('statut', '=','Actif')
        ->where('id', '=', $offre_id_input)
        ->first();
        $offre_reference_input=$offre->reference;

        // dd($offre_reference_input);

        $pays =  DB::table('pays')
        ->where('statut', '=','Actif')
        ->get();

        $countries =  DB::table('countries')
        ->get();

        $niveaux =  DB::table('niveau_etudes')
        ->where('statut', '=','Actif')
        ->get();
        $payss =  DB::table('pays')
        ->where('statut', '=','Actif')
        ->get();
        if($request->isMethod("post"))
        {

                $_validator = Validator::make($request->all(),[
                    "offre_id"=>"required",
                    "offre_reference"=>"required",
                    "nom"=>"required",
                    "prenom"=>"required",
                    "dateNaissance"=>"required",
                    "lieuNaissance"=>"required",
                    "sexe"=>"required",
                    "nationnalite"=>"required",
                    "email"=>"required",
                    "niveau"=>"required",
                    "statut_emp"=>"required",
                    "numeroTel1"=>"required",
                    "indicatif1"=>"required",
                    "experience"=>"required",
                    "adresse"=>"required",
                    "paysResidence"=>"required",

                ],

                [

                ],
                [
                ]);


            if($_validator->fails())
            {
                // dd($_validator);
                  return redirect(route('step1', $offre->id))
                        ->withErrors($_validator)
                        ->withInput()
                        ->with('warning', 'non Enregistrement effectué');

            }

            $succes = false;
            $messageErreur = "L'enregistrement de domaine a échoué";

            try
            {

                $offre_reference = $request->input('offre_reference');
                $offre_id = $request->input('offre_id');
                $nom = $request->input('nom');
                $prenom = $request->input('prenom');
                $dateNaissance = $request->input('dateNaissance');
                $lieuNaissance = $request->input('lieuNaissance');
                $sexe = $request->input('sexe');
                $nationnalite = $request->input('nationnalite');
                $niveau = $request->input('niveau');
                $statut_emp = $request->input('statut_emp');
                $email = $request->input('email');
                $indicatif1 = $request->input('indicatif1');
                $indicatif2 = $request->input('indicatif2');
                $numeroTel1 = $request->input('numeroTel1');
                $numeroTel2 = $request->input('numeroTel2');
                $adresse = $request->input('adresse');
                $paysResidence = $request->input('paysResidence');
                $experience = $request->input('experience');



                session([
                    "info_perso" => [
                    'offre_id'=>$offre_id,
                    'offre_reference'=>$offre_reference,
                    'nom'=> $nom,
                    'prenom'=> $prenom,
                    'dateNaissance'=> $dateNaissance,
                    'lieuNaissance'=> $lieuNaissance,
                    'sexe'=> $sexe,
                    'nationnalite'=> $nationnalite,
                    'niveau'=> $niveau,
                    'statut_emp'=> $statut_emp,
                    'email'=> $email,
                    'indicatif1'=> $indicatif1,
                    'indicatif2'=> $indicatif2,
                    'numeroTel1'=> $numeroTel1,
                    'numeroTel2'=> $numeroTel2,
                    'adresse'=> $adresse,
                    'experience'=> $experience,
                    'paysResidence'=> $paysResidence,
                    'link' => $email . '_' . $offre_id . '_' .$offre_reference,


                ]]);


                // dd(session('info_perso'));
                $succes=true;

                $candidat= DB::table('candidatures')
                ->where('link', '=', session('info_perso')['link'])
                ->first();

                // dd(session('info_perso')['link']);

                $exist = false;

                if(isset($candidat)){
                    $exist=true;
                    // dd('hu');
                }



            }

            catch(\Exception $e)
            {
               $messageErreur = $e->getMessage();
               Log::error($e);
            //    dd($messageErreur);

               $succes=false;

            }
            // dd(session('info_perso'));



            if($succes && $exist==false){
                return redirect(route('step2', $offre->id))->with('success', 'Enregistrement effectué avec succes');
                }

            elseif($succes && $exist==true){
                return redirect()->back()->with('danger', 'Cette candidature existe déjà :(');
            }
            else
            {
                return redirect()->back()->with("warning", $messageErreur)->withInput();
            }

        }

        return view('frontOffice.offre.form.step1', compact('offre_id_input', 'pays', 'payss','niveaux', 'offre_reference_input', 'offre', 'countries'));
    }

    public function step2(Request $request, Offre $offre){
        // dd($offre->id);
        $offre_id_input = $offre->id;

        $offre =  DB::table('offres')
        ->where('statut', '=','Actif')
        ->where('id', '=', $offre_id_input)
        ->first();

        $domaines =  DB::table('domaines')
        ->where('statut', '=','Actif')
        ->get();

        $pays =  DB::table('pays')
        ->where('statut', '=','Actif')
        ->get();

        $pays2 =  DB::table('pays')
        ->where('statut', '=','Actif')
        ->get();

        $formations =  DB::table('formations')
        ->select('document','link','formations.libelle as formation_libelle', 'domaines.libelle as domaine_libelle', 'pays.libelle as pays_libelle','annee_diplome','etablissement', 'formations.id')

        ->where('link', '=', session('info_perso')['link'] )
        ->join('domaines', 'domaines.id', '=', 'formations.domaine_id')
            ->join('pays', 'pays.id', '=', 'formations.pays_id')
        ->get();

        $count= $formations->count();

        // dd($countw);

        if($request->isMethod("post"))
        {

            if($count !== 0){
                return redirect(route('step3', $offre->id))->with('success', 'Enregistrement effectué avec succes');
                }


            else
            {
                return redirect()->back()->with('warning', 'Enregistrement effectué avec succes');
            }

        }




        return view('frontOffice.offre.form.step2', compact('pays','domaines', 'formations', 'count', 'offre', 'pays2'));
    }

    public function step3(Request $request, Offre $offre){
        $offre_id_input = $offre->id;

        $offre =  DB::table('offres')
        ->where('statut', '=','Actif')
        ->where('id', '=', $offre_id_input)
        ->first();

        $pays =  DB::table('pays')
        ->where('statut', '=','Actif')
        ->get();

        $experiences =  DB::table('experiences')

        ->join('pays', 'pays.id', '=', 'experiences.pays_id')

        ->where('link', '=', session('info_perso')['link'] )
        ->get();

        $count= $experiences->count();
        $sans_experience = false;

        if($request->isMethod("post"))
        {

            try
            {

             $no_experience = $request->input('no_experience');
            //  dd($no_experience);

            }

            catch(\Exception $e)
            {
               $messageErreur = $e->getMessage();
               Log::error($e);

            }

            if(isset($no_experience)){
                $sans_experience = true;
            }

            if($count !== 0 && $sans_experience==false){
                return redirect(route('step4', $offre->id))->with('success', 'Enregistrement effectué avec succes');
            }

            elseif($count == 0 && $sans_experience==true){
                return redirect(route('step4', $offre->id))->with('success', 'Enregistrement effectué avec succes');
            }

            else
            {

                return redirect()->back()->with('warning', 'Enregistrement non effectué avec succes');
            }

        }
        return view('frontOffice.offre.form.step3', compact('pays', 'count', 'experiences' ,'offre'));
    }

    public function step4(Request $request, Offre $offre){
        $offre_id_input = $offre->id;

        $offre =  DB::table('offres')
        ->where('statut', '=','Actif')
        ->where('id', '=', $offre_id_input)
        ->first();

        $langues =  DB::table('langues')
        ->where('link', '=', session('info_perso')['link'] )
        ->get();

        $count = $langues->count();
        if($request->isMethod("post"))
        {

            if($count !== 0){
                return redirect(route('step5', $offre->id))->with('success', 'Enregistrement effectué avec succes');
                }


            else
            {
                return redirect()->back()->with('warning', 'Enregistrement effectué avec succes');
            }

        }

        return view('frontOffice.offre.form.step4', compact('langues', 'count', 'offre'));
    }
    public function step5(Request $request, Offre $offre){
        $offre_id_input = $offre->id;

        $offre =  DB::table('offres')
        ->where('statut', '=','Actif')
        ->where('id', '=', $offre_id_input)
        ->first();

        // dd($offre);

        $offre2 = DB::table('offres')
        ->select(
        'offres.libelle as offre_libelle',
        'domaines.libelle as domaine_libelle',
        'offres.id',
        'niveau_etudes.libelle as niveau_etudes_libelle',
        'domaines.libelle as domaine_libelle',
        )
        ->where('offres.id', '=', $offre_id_input)
        ->join('domaines', 'domaines.id', '=', 'offres.domaine_id')
        ->join('ages', 'ages.id', '=', 'offres.age_id')
        ->join('niveau_etudes', 'niveau_etudes.id', '=', 'offres.niveau_etudes_id')
        ->first();

        if($request->isMethod("post"))

        {
                $_validator = Validator::make($request->all(),[
                    'cv'=>'required|mimes:pdf|max:5120',
                    'type_piece'=>'required',
                    'piece'=>'required|mimes:pdf|max:5120',
                    'nationnalite_doc'=>'required|mimes:pdf|max:5120',
                ]);

                // dd($_validator);

            if($_validator->fails())
            {

                  return redirect(route('step5', $offre->id))
                        ->withErrors($_validator)
                        ->withInput();

            }


            $messageErreur = "La prise en compte de l'étape 7 à échoué";

            try
            {

                $candidature=null;
            $cv=$request->file('cv');
            $type_piece=$request->input('type_piece');
            $piece=$request->file('piece');
            $nationnalite_doc=$request->file('nationnalite_doc');



                $path1 = null;
                $path2 = null;
                $path3 = null;

                if ($request->hasFile('cv')) {
                    $cv = $request->file('cv');
                    $path1 = $cv->store('Candidatures/cv', 'public');
                }

                if ($request->hasFile('piece')) {
                    $piece = $request->file('piece');
                    $path2 = $piece->store('Candidatures/piece', 'public');
                }


                if ($request->hasFile('nationnalite_doc')) {
                    $nationnalite_doc = $request->file('nationnalite_doc');
                    $path3 = $nationnalite_doc->store('Candidatures/nationnalite_doc', 'public');
                }

                // dd(session('info_perso')['offre_id']);

                $candidature=Candidature::create([



                    'nom'=>strtoupper(session('info_perso')['nom']),
                    'prenom'=>session('info_perso')['prenom'],
                    'dateNaissance'=>session('info_perso')['dateNaissance'],
                    'lieuNaissance'=>session('info_perso')['lieuNaissance'],
                    'sexe'=>session('info_perso')['sexe'],
                    'nationnalite'=>session('info_perso')['nationnalite'],
                    'niveau'=>session('info_perso')['niveau'],
                    'statut_emp'=>session('info_perso')['statut_emp'],
                    'email'=>session('info_perso')['email'],
                    'numeroTel1'=>session('info_perso')['numeroTel1'],
                    'numeroTel2'=>session('info_perso')['numeroTel2'],
                    'indicatif1'=>session('info_perso')['indicatif1'],
                    'indicatif2'=>session('info_perso')['indicatif2'],
                    'adresse'=>session('info_perso')['adresse'],
                    'paysResidence'=>session('info_perso')['paysResidence'],
                    'link'=>session('info_perso')['link'],

                    'offre_id'=>session('info_perso')['offre_id'],

                    'experience'=>session('info_perso')['experience'],

                    'cv'=>$path1,
                    'type_piece'=>$type_piece,
                    'piece'=>$path2,
                    'nationnalite_doc'=>$path3,
                ]);

                $succes=true;
                // dd('hi');
                // dd($candidature);


            }

            catch(\Exception $e)
            {
               $messageErreur = $e->getMessage();
               Log::error($e);
               $succes=false;
            //    dd($messageErreur);


            }



            $messageErreurmail = 'Vous êtes hors connexion, veuillez vous connecter s\'il vous plait';
            $succes_mail=false;



            if($succes){
                $data = [
                    'nom' => session('info_perso')['nom'],
                    'prenom' => session('info_perso')['prenom'],
                    'email' => session('info_perso')['email'],
                    'poste' => $offre2->domaine_libelle,
                    // 'experience' => session('info_perso')['offre_id'],
                ];
                Mail::to($data['email'])->send(new CandidatureMail($data));
                Session::flush();


                return view('frontOffice.offre.form.succes',compact('candidature','offre'));






            }

            else
            {
                return redirect()->back()->with('echec', $messageErreurmail)->withInput();
            }

    }

    return view('frontOffice.offre.form.step5', compact('offre'));
}

}
