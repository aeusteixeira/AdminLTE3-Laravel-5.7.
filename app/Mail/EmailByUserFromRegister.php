<?php

namespace App\Mail;

use App\Register;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailByUserFromRegister extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $message;
    protected $register;

    public function __construct($title, $message, Register $register)
    {
        $this->title = $title;
        $this->message = $message;
        $this->register = $register;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->title);
        $this->to($this->register->email, $this->register->name);
        return $this->view('emails.EmailByUserFromRegister', [
            'message_content' => $this->message
        ]);
    }
}
