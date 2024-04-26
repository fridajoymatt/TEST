<?php

namespace App\Http\Controllers;

use App\Mail\NewletterMail;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsletterSubscriberController extends Controller
{
    public function subscribe(Request $request)
    {

        if($request->isMethod("post"))
        {

                $_validator = Validator::make($request->all(),[
                    'email' => 'required|email|',
                ]);

                // dd($_validator);

            if($_validator->fails())
            {
                  return redirect(route('newsletter.subscribe'))
                        ->withErrors($_validator)
                        ->withInput();

            }

            $succes = false;
            $messageErreur = "L'enregistrement de votre email a échoué";

            try
            {
            //  dd('try');
             $email = $request->input('email');
             $existingSubscriber = DB::table('newsletter_subscribers')
                ->Where ('email','=',$email)
                ->get();

                if($existingSubscriber->count() == null)
                {
                    NewsletterSubscriber::create([

                        'email' => $email,
                        'already' => 'déjà',
                    ]);
                    $succes=true;
                    $warning=false;
                }

                else
                {
                    $warning=true;
                }


            }

            catch(\Exception $e)
            {
               $messageErreur = $e->getMessage();
               Log::error($e);

            }



            if ($succes) {
                $data = [
                    'email' => $email,
                ];
                Mail::to($data['email'])->send(new NewletterMail($data));

                return response()->json([
                    'title' => 'Succès!',
                    'message' => 'Cet e-mail est ajouté abonné à la newsletter.',
                    'icon' => 'success',
                ]);
            } elseif ($warning) {
                return response()->json([
                    'title' => 'Attention!',
                    'message' => 'Cet e-mail est déjà ajouté abonné à la newsletter.',
                    'icon' => 'warning',
                ]);
            } else {
                return response()->json([
                    'title' => 'Erreur!',
                    'message' => 'L\'enregistrement de votre email a échoué',
                    'icon' => 'error',
                ]);
            }
        }
    }
}
