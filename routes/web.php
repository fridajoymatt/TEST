<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});


//  <////////////////////////////////////////////

//                  ROUTE DU FRONTOFFICE

// <//////////////////////////////////////////////

Route::group(["namespace"=>"App\Http\Controllers\FrontOffice"],function(){

    Route::get('/',[
        "as" => "home",
        "uses" => "HomeController@index"
    ]);

    Route::match(['get', 'post'], '/faqs',[
        "as" => "faqs",
        "uses" => "HomeController@faqs"
    ]);

    Route::match(['get', 'post'], '/contact',[
        "as" => "contact",
        "uses" => "HomeController@contact"
    ]);

    Route::match(['get', 'post'], '/form-contact',[
        "as" => "form-contact",
        "uses" => "ContactController@send"
    ]);


    Route::match(['get', 'post'], '/index_offre',[
        "as" => "index_offre",
        "uses" => "HomeController@index_offre"
    ]);

    Route::match(['get', 'post'], '/postuler/{offre?}',[
        "as" => "postuler",
        "uses" => "HomeController@postuler"
    ]);

    Route::match(['get', 'post'], '/step1/{offre?}',[
        "as" => "step1",
        "uses" => "PostulerController@step1"
    ]);

    Route::match(['get', 'post'], '/step2/{offre?}',[
        "as" => "step2",
        "uses" => "PostulerController@step2"
    ]);

        Route::match(['get', 'post'], '/step3/{offre?}',[
        "as" => "step3",
        "uses" => "PostulerController@step3"
    ]);

    Route::match(['get', 'post'], '/step4/{offre?}',[
        "as" => "step4",
        "uses" => "PostulerController@step4"
    ]);

    Route::match(['get', 'post'], '/step5/{offre?}',[
        "as" => "step5",
        "uses" => "PostulerController@step5"
    ]);

    Route::match(['get', 'post'], '/step6/{offre?}',[
        "as" => "step6",
        "uses" => "PostulerController@step6"
    ]);




    Route::match(['get', 'post'], '/create-formation',[
        "as" => "createFormation",
        "uses" => "FormationController@createFormation"
    ]);

    Route::match(['get', 'post'], '/index-formation',[
        "as" => "indexFormation",
        "uses" => "FormationController@indexFormation"
    ]);

    Route::match(['get', 'post'], '/update-formation/{formation?}',[
        "as" => "updateFormation",
        "uses" => "FormationController@updateFormation"
    ]);

    Route::get('/formation/{id}', 'FormationController@getFormation');


    Route::match(['get', 'post'], '/delete-formation/{formation?}',[
        "as" => "deleteFormation",
        "uses" => "FormationController@deleteFormation"
    ]);

    Route::match(['get', 'post'], '/restore-formation/{formation?}',[
        "as" => "restoreFormation",
        "uses" => "FormationController@restoreFormation"
    ]);


    Route::match(['get', 'post'], '/create-langue',[
        "as" => "createLangue",
        "uses" => "LangueController@createLangue"
    ]);

    Route::match(['get', 'post'], '/delete-langue/{langue?}',[
        "as" => "deleteLangue",
        "uses" => "LangueController@deleteLangue"
    ]);



    Route::match(['get', 'post'], '/create-experience',[
        "as" => "createExperience",
        "uses" => "ExperienceController@createExperience"
    ]);

    Route::match(['get', 'post'], '/index-experience',[
        "as" => "indexExperience",
        "uses" => "ExperienceController@indexExperience"
    ]);

    Route::match(['get', 'post'], '/update-experience/{experience?}',[
        "as" => "updateExperience",
        "uses" => "ExperienceController@updateExperience"
    ]);

    Route::match(['get', 'post'], '/delete-experience/{experience?}',[
        "as" => "deleteExperience",
        "uses" => "ExperienceController@deleteExperience"
    ]);

    Route::match(['get', 'post'], '/restore-experience/{experience?}',[
        "as" => "restoreExperience",
        "uses" => "ExperienceController@restoreExperience"
    ]);

    Route::match(['get', 'post'], '/filtrer',[
        "as" => "filtrer",
        "uses" => "FiltreController@filtrer"
    ]);


});

Route::match(['get', 'post'], '/newsletter/subscribe',[
    "as" => "newsletter.subscribe",
    "uses" => "App\Http\Controllers\NewsletterSubscriberController@subscribe"
]);






//  <////////////////////////////////////////////

//                  ROUTE DU BACKOFFICE

// <//////////////////////////////////////////////

Route::group(["namespace"=>"App\Http\Controllers\BackOffice"],function(){

    Route::match(['get', 'post'], '/admin-dash',[
        "as" => "dashboard",
        "uses" => "HomeController@index"
    ]);

});

Route::group(["namespace"=>"App\Http\Controllers\BackOffice"],function(){

    Route::match(['get', 'post'], '/create-domaine',[
        "as" => "createDomaine",
        "uses" => "DomaineController@createDomaine"
    ]);

    Route::match(['get', 'post'], '/index-domaine',[
        "as" => "indexDomaine",
        "uses" => "DomaineController@indexDomaine"
    ]);

    Route::match(['get', 'post'], '/update-domaine/{domaine?}',[
        "as" => "updateDomaine",
        "uses" => "DomaineController@updateDomaine"
    ]);

    Route::match(['get', 'post'], '/delete-domaine/{domaine?}',[
        "as" => "deleteDomaine",
        "uses" => "DomaineController@deleteDomaine"
    ]);

    Route::match(['get', 'post'], '/restore-domaine/{domaine?}',[
        "as" => "restoreDomaine",
        "uses" => "DomaineController@restoreDomaine"
    ]);


    Route::match(['get', 'post'], '/create-niveau',[
        "as" => "createNiveau",
        "uses" => "NiveauController@createNiveau"
    ]);

    Route::match(['get', 'post'], '/index-niveau',[
        "as" => "indexNiveau",
        "uses" => "NiveauController@indexNiveau"
    ]);

    Route::match(['get', 'post'], '/update-niveau/{niveau?}',[
        "as" => "updateNiveau",
        "uses" => "NiveauController@updateNiveau"
    ]);

    Route::match(['get', 'post'], '/delete-niveau/{niveau?}',[
        "as" => "deleteNiveau",
        "uses" => "NiveauController@deleteNiveau"
    ]);

    Route::match(['get', 'post'], '/restore-niveau/{niveau?}',[
        "as" => "restoreNiveau",
        "uses" => "NiveauController@restoreNiveau"
    ]);

    Route::match(['get', 'post'], '/index-candidature',[
        "as" => "indexCandidature",
        "uses" => "CandidatureController@indexCandidature"
    ]);



    Route::match(['get', 'post'], '/create-pays',[
        "as" => "createPays",
        "uses" => "PaysController@createPays"
    ]);

    Route::match(['get', 'post'], '/index-pays',[
        "as" => "indexPays",
        "uses" => "PaysController@indexPays"
    ]);

    Route::match(['get', 'post'], '/update-pays/{pays?}',[
        "as" => "updatePays",
        "uses" => "PaysController@updatePays"
    ]);

    Route::match(['get', 'post'], '/delete-pays/{pays?}',[
        "as" => "deletePays",
        "uses" => "PaysController@deletePays"
    ]);

    Route::match(['get', 'post'], '/restore-pays/{pays?}',[
        "as" => "restorePays",
        "uses" => "PaysController@restorePays"
    ]);







    Route::match(['get', 'post'], '/create-age',[
        "as" => "createAge",
        "uses" => "AgeController@createAge"
    ]);

    Route::match(['get', 'post'], '/index-age',[
        "as" => "indexAge",
        "uses" => "AgeController@indexAge"
    ]);

    Route::match(['get', 'post'], '/update-age/{age?}',[
        "as" => "updateAge",
        "uses" => "AgeController@updateAge"
    ]);

    Route::match(['get', 'post'], '/delete-age/{age?}',[
        "as" => "deleteAge",
        "uses" => "AgeController@deleteAge"
    ]);

    Route::match(['get', 'post'], '/restore-age/{age?}',[
        "as" => "AgeController",
        "uses" => "AgeController@restoreAge"
    ]);



    Route::match(['get', 'post'], '/create-offre',[
        "as" => "createOffre",
        "uses" => "OffreController@createOffre"
    ]);

    Route::match(['get', 'post'], '/index-offre',[
        "as" => "indexOffre",
        "uses" => "OffreController@indexOffre"
    ]);

    Route::match(['get', 'post'], '/update-offre/{offre?}',[
        "as" => "updateOffre",
        "uses" => "OffreController@updateOffre"
    ]);

    Route::match(['get', 'post'], '/delete-offre/{offre?}',[
        "as" => "deleteOffre",
        "uses" => "OffreController@deleteOffre"
    ]);

    Route::match(['get', 'post'], '/restore-offre/{offre?}',[
        "as" => "restoreOffre",
        "uses" => "OffreController@restoreOffre"
    ]);




    Route::match(['get', 'post'], '/mon-profil',[
        "as" => "monProfil",
        "uses" => "UserController@monProfil"
    ]);


    Route::match(['get', 'post'], '/edit-profil',[
        "as" => "editProfil",
        "uses" => "UserController@editProfil"
    ]);


    Route::match(['get', 'post'], '/update-profil',[
        "as" => "updateProfil",
        "uses" => "UserController@updateProfil"
    ]);

    Route::match(['get', 'post'], '/update-user/{user?}',[
        "as" => "updateUser",
        "uses" => "UserController@updateUser"
    ]);

    Route::match(['get', 'post'], '/edit-user/{user?}',[
        "as" => "editUser",
        "uses" => "UserController@editUser"
    ]);

    Route::match(['get', 'post'], '/create-user',[
        "as" => "createUser",
        "uses" => "UserController@createUser"
    ]);

    Route::match(['get', 'post'], '/index-user',[
        "as" => "indexUser",
        "uses" => "UserController@indexUser"
    ]);

    Route::match(['get', 'post'], '/delete-user/{user?}',[
        "as" => "deleteUser",
        "uses" => "UserController@deleteUser"
    ]);

    Route::match(['get', 'post'], '/restore-user/{user?}',[
        "as" => "restoreUser",
        "uses" => "UserController@restoreUser"
    ]);



});

Auth::routes();

Route::get('/admin-dash', [App\Http\Controllers\BackOffice\HomeController::class, 'index'])->name('dashboard');

Route::get('toastr-notification',[\App\Http\Controllers\HomeController::class,'toastrNotification']);
