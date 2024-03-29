<?php

namespace App\Mail;

use App\Model\User\Contact;
use App\Model\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GroupeEmailMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $subject;
    public $msg;

    public function __construct($subject,$msg)
    {
        $this->subject = $subject;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::select('sendmail')->first();
        return $this->from($user->sendmail)->markdown('emails.admins.groupe');
    }
}
