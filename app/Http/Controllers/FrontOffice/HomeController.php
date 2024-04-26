<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Offre;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index(Request $request){
        $current = date('y-m-d');

        $offres =  DB::table('offres')
        // ->where('statut', '=','Actif')
        // ->where('date_limite','<=', $current)

        ->limit(6)
        ->get();

        // dd($offres);

        $count= $offres->count();


        return view('frontOffice.home', compact('offres', 'count'));
    }

    public function contact(Request $request){
        return view('frontOffice.contact');
    }

    public function faqs(){
        return view('frontOffice.faqs');
    }

    public function index_offre(Request $request){
        $current = date('d-m-y');
        $offress =  DB::table('offres')
        ->where('statut', '=','Actif')
        // ->where('date_limite','<=', $current)
        // ->orderBy('name', 'asc')
        ->get();

        $offres =  DB::table('offres')
        ->where('statut', '=','Actif')
        // ->where('date_limite','<=', $current)
        // ->orderBy('name', 'asc')
        ->paginate(4);


        $domaines =  DB::table('domaines')
        ->where('statut', '=','Actif')
        // ->orderBy('name', 'asc')
        ->get();

        $niveaux =  DB::table('niveau_etudes')
        ->where('statut', '=','Actif')
        // ->orderBy('name', 'asc')
        ->get();

        $count=$offress->count();
        return view('frontOffice.offre.index', compact('offres', 'count', 'niveaux', 'domaines'));
    }

    public function postuler(Offre $offre, Request $request){
        Session::flush();
        $offre_id= $offre->id;
        $offre = DB::table('offres')
        ->select(
        'offres.libelle as offre_libelle',
        'domaines.libelle as domaine_libelle',
        'offres.id',
        'offres.reference',
        'offres.experience',
        'offres.details',
        'offres.pdfFile',
        'offres.date_limite',
        'offres.heure_limite',
        'offres.statut',
        'offres.user_id',
        'ages.debut',
        'ages.fin',
        'niveau_etudes.libelle as niveau_etudes_libelle',
        'domaines.libelle as domaine_libelle',
        'offres.resume'
        )
        ->where('offres.id', '=', $offre_id)
        ->join('domaines', 'domaines.id', '=', 'offres.domaine_id')
        ->join('ages', 'ages.id', '=', 'offres.age_id')
        ->join('niveau_etudes', 'niveau_etudes.id', '=', 'offres.niveau_etudes_id')
        ->first();
        // dd($offre);


        return view('frontOffice.offre.postuler', compact('offre'));
    }
}
