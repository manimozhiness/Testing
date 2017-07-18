<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class AssignCE extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public $assignPNR;
    public function __construct($assignPNR)
    {
        $this->assignPNR=$assignPNR;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=$this->assignPNR;
       
        $user=User::where('email',$data->Respective_CE)->first();
        return $this->from($data->requestorEmail)
                    ->markdown('pnr.assigncebymail')
                    ->with('data',$data)->with('user',$user);
    }
}
