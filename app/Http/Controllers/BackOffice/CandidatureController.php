<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatureController extends Controller
{
    public function indexCandidature(){
        $candidatures =  DB::table('candidatures')
            // ->where('statut', '=','Actif')
            // ->orderBy('name', 'asc')
            ->get();
        return view('backOffice.candidature.index', compact('candidatures'));
    }

}
