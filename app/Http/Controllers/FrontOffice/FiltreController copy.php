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
    $query = Offre::query();

    dd($query);
    $domainesSelectionnes = $request->input('domaine', []);
        $niveauxSelectionnes = $request->input('niveau', []);
        // $experiencesSelectionnees = $request->input('experience', []);
        // dd(var_dump($domainesSelectionnes));


        $offres = DB::table('offres')
                        ->whereIn('domaine_id', $domainesSelectionnes)
                        ->whereIn('niveau_etudes_id', $niveauxSelectionnes)
                        // ->whereIn('experience', $experiencesSelectionnees)
                        ->paginate(1);

        $offresFiltrees =  DB::table('offres')
                    // ->whereIn('domaine_id', $domainesSelectionnes)
                    // ->whereIn('niveau_etudes_id', $niveauxSelectionnes)
                    // ->whereIn('experience', $experiencesSelectionnees)
                    ->query();

        if (isset($domainesSelectionnes)) {
            $offresFiltrees->whereIn('domaine_id', $domainesSelectionnes);
        }

        if (isset($niveauxSelectionnes)) {
            $offresFiltrees->whereIn('niveau_etudes_id', $niveauxSelectionnes);
        }

        // if (isset($experiencesSelectionnees)) {
        //     $offresFiltrees->whereIn('experience', $experiencesSelectionnees);
        // }


        $count = $offresFiltrees->count();

        $domaines =  DB::table('domaines')
        ->where('statut', '=','Actif')
        ->get();

        $niveaux =  DB::table('niveau_etudes')
        ->where('statut', '=','Actif')
        ->get();

        dd($offresFiltrees);


        return view('frontOffice.offre.index', compact('offres', 'count', 'niveaux', 'domaines'));
}

}
