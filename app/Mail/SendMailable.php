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

        $Product_in_Lead='';

        foreach($this->lead_data["products"] as $Product_in_Lead)
        {
            $Product_in_Lead = $this->lead_data["products"]["name"].$Product_in_Lead.", ";
        }
            
        

        return $this->from("enquiry@agisafety.com", "InstrumentFinder Teams")
        ->subject("Lead : ".$rfqID." ,from : ".$leadfrom." ship to : ".$shipping." product : ".$Product_in_Lead)
         ->view('email.emailtemplate');

       
        
    }
}
