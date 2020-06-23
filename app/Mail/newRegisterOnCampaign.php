<?php

namespace App\Mail;

use App\Campaign;
use App\Register;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class newRegisterOnCampaign extends Mailable
{
    use Queueable, SerializesModels;

    private $register;
    private $campaign;

    public function __construct(Register $register, Campaign $campaign)
    {
        $this->register = $register;
        $this->campaign = $campaign;
    }

    public function build()
    {
        $this->subject($this->campaign->name_public);
        $this->to($this->register->email, $this->register->name);
        return $this->markdown('emails.newRegisterOnCampaign', [
            'register' => $this->register,
            'campaign' => $this->campaign
        ]);
    }
}
