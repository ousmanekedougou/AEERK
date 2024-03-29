<?php

namespace App\Mail;

use App\Model\User\Contact;
use App\Model\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResponseEmailMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $msg;

    public function __construct(Contact $msg)
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
        $user = User::select('sendmail')->first();
        return $this->from($user->sendmail)->markdown('emails.admins.response');
        // return $this->from(config('aeerk.admin_support_email'))->markdown('emails.admins.response');
    }
}
