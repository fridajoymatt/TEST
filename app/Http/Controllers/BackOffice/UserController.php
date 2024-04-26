<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    //PROFIL CONTROLLER

    public function monProfil(){
        return view('backOffice.profil.index');
    }
    public function editProfil(){
        return view('backOffice.profil.edit');
    }

    public function updateProfil( Request $request){
       $user = Auth::user();
    //    dd($user);
       $succes = false;
       $messageErreur = "La mise à jour a échoué/ confirmation de mot de passe incorrect";

       try
       {
        $confirm_password= $request->input('confirm_password');
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        // $user->group = $user->input('group');
        $password = $request->input('password');
        $user->password = Hash::make($password);
        $user->save();

        $succes=true;
       // Domaine::table('domaines')->where( $domaine->libelle)->update(['domaine' => $domaine]);
           $succes=true;
       }
       catch(\Exception $e)
       {
          // echo 'VOICI VOTRE ERREUR',  $e->getMessage(), "\n";
          $messageErreur = $e->getMessage();
          Log::error($e);

       }

            if(($succes)&&($password === $confirm_password))
            {

              return redirect()->back()->with('success', 'Enregistrement effectué avec succes');

            }

            elseif(($succes)&&($password !== $confirm_password))
            {

              return redirect()->back()->with('warning', 'Mot de passe et confirmation de mot de passe non conforme');
              
            }


           else
           {



               return redirect()->back()->with("danger", $messageErreur)->withInput();

           }
        }


        //USER CONTROLLER

        public function indexUser(){
            $query =  DB::table('users')
            ->orderBy('name', 'asc')
            ->where('state', '=', 'Actif');
            $users = $query->get();


            $query_delete =  DB::table('users')
            ->orderBy('name', 'asc')
            ->where('state', '!=', 'Actif');
            $users_deletes = $query_delete->get();

            return view('backOffice.user.index', compact('users', 'users_deletes'));
        }

            
        protected function createUser(Request $request)
        {
            if($request->isMethod("post"))
            {
    
                $_validator =  Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:255'],
                    'surname' => ['required', 'string', 'max:255'],
                    // 'statute' => ['required', 'string', 'max:255'],
                    'group' => ['required', 'string', 'max:255'],

                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
    
                    if($_validator->fails())
                    {

                        return redirect(route('indexUser'))
                                ->withErrors($_validator)
                                ->withInput()
                                ->with('warning', 'non Enregistrement effectué');
    
                    }
    
                    $succes = false;
                    $messageErreur = "L'enregistrement de l'utilisateur a échoué";
    
                    try
                    {
                        $name = $request->input('name');
                        $surname = $request->input('surname');
                        $email = $request->input('email');
                        $password = $request->input('password');
                        // $status = $request->input('status');
                        $group = $request->input('group');

                    User::create([
                        'name'  => $name,
                        'surname'  => $surname,
                        'email'  => $email,
                        'password'  => Hash::make($password),
                        'status'  => 'Actif',
                        'group'  => $group,
                        'by' =>Auth::user()->id,

                       
                    ]);
    
                    // Mail::to($data->email)->send(new formulaire);


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
    
                // dd('bonsoir');
    
                return redirect()->back()->with("echec", $messageErreur)->withInput();
    
                }    
            }    
    
        }

            
        public function deleteUser(Request $request, User $user)
        {
            $user->state = 'Inactif';
            $user->save();       

            return back()->with('success', 'Utilisateur '.$user->name .' '. $user->last_name.' désactivé avec succes');
        
        }

        public function restoreUser(Request $request, User $user)
        {
            $user->state = 'Actif';
            $user->save();       

            return back()->with('success', 'Utilisateur '.$user->name .' '. $user->last_name.' désactivé avec succes');
        
        }


}
