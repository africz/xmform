<?php

namespace App\Mail;

use App\Nasdaq;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class XmFormData extends Mailable
{
    use Queueable, SerializesModels;

    public $xmform_data;
    private $_subject=null;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$subject)
    {
        $this->xmform_data = $data;
        $n = new Nasdaq();
        $this->subject = $n->getCompanyName($subject);
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->_subject)
        ->from('attila.fricz@gmail.com')    
        ->to('attila.fricz@gmail.com')    
        ->view('email');
    }
}
