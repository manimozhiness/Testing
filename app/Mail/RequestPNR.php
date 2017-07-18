<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestPNR extends Mailable
{
     use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $pnr_request;
    public function __construct($pnr_request)
    {
        $this->pnr_request = $pnr_request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $requestData=$this->pnr_request;
  
        return $this->from($requestData['requestorEmail'])
                     ->markdown('pnr.mailrequest')->with('requestData',$requestData);
    }
}
