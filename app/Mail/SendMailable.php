<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;



class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $lead_data;
    public function __construct($data)
    {
        $this->lead_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        

        $shipping = $this->lead_data["lead"]["country_shipping"];
        $rfqID = $this->lead_data["lead"]["order_id"];

        $leadfrom = $this->lead_data["lead"]["country_emoji"]."|".$this->lead_data["lead"]["country"];



        return $this->from("Enquiry@instrumentsfinder.com", "InstrumentFinder Teams")
        ->subject("Lead : ".$rfqID." ,from : ".$leadfrom." ship to : ".$shipping)
        ->view('email.emailtemplate');


       
        
    }
}
