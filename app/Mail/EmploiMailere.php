<?php

namespace App\Mail;

use App\Model\Admin\Info;
use App\Model\User\Etudiant;
use App\Model\User\Job;
use App\Model\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class EmploiMailere extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $msg;

    public function __construct($genre , $name , $sendCode)
    {
        $this->genre = $genre;
        $this->name = $name;
        $this->sendCode = $sendCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::first();
        return $this->from($user->sendmail)->markdown('emails.admins.emploi')->with([
            'genre' => $this->genre,
            'name' => $this->name,
            'code' => $this->sendCode,
        ]);
    }
}


