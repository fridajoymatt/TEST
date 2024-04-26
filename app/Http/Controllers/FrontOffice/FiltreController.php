<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FiltreController extends Controller
{
    public function filtrer(Request $request)
{
    $current = date('d-m-y');

    $query = Offre::query();

    $domainesSelectionnes = $request->input('domaine', []);
        $niveauxSelectionnes = $request->input('niveau', []);
        $experiencesSelectionnees = $request->input('experience', []);
        // dd(var_dump($domainesSelectionnes));


        $domainesSelectionnes = $request->input('domaine', []);
        if (!empty($domainesSelectionnes)) {
            $query->whereIn('domaine_id', $domainesSelectionnes);
        }

        $niveauxSelectionnes = $request->input('niveau', []);
        if (!empty($niveauxSelectionnes)) {
            $query->whereIn('niveau_etudes_id', $niveauxSelectionnes);
        }

        $experiencesSelectionnees = $request->input('experience', []);
        if (!empty($experiencesSelectionnees)) {
            $query->whereIn('experience', $experiencesSelectionnees);
        }

        $offresFiltrees = $query
        ->where('date_limite','<=', $current)
        ->get();

        $offres = $query->paginate(5);

        $count = $offresFiltrees->count();


        $domaines =  DB::table('domaines')
        ->where('statut', '=','Actif')
        ->get();

        $niveaux =  DB::table('niveau_etudes')
        ->where('statut', '=','Actif')
        ->get();

        // dd($offresFiltrees);


        return view('frontOffice.offre.index', compact('offres', 'count', 'niveaux', 'domaines'));
}

}
