<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
class AssignJCE extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $assignJCE;
    public function __construct($assignJCE)
    {
        $this->assignJCE=$assignJCE;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=$this->assignJCE;
        
        $user=User::where('email',$data['Respective_JCE'])->first();
        return $this->from($data->requestorEmail)
                    ->markdown('pnr.assignjcebymail')
                    ->with('data',$data)->with('user',$user);
    }
}
