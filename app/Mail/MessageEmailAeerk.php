<?php

namespace App\Mail;

use App\Model\Admin\Info;
use App\Model\User\Etudiant;
use App\Model\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class MessageEmailAeerk extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $msg;

    public function __construct(Etudiant $msg)
    {
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $user = User::first();
        $info = Info::first();
        return $this->from($user->sendmail)->markdown('emails.admins.created',compact('info','user'));
    }
}
