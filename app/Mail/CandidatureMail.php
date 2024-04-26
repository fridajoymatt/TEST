<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CandidatureMail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */

     public $data;

     public function __construct($data)
     {
         $this->data = $data;

     }

     public function build()
     {
         return $this->view('emails.candidatureEmail')
                     ->subject('Candidature soumise avec succès')
                     ->with('data',$this->data);
     }
}
