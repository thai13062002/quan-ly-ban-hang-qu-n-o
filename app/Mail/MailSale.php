<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Swift_Attachment;

class MailSale extends Mailable
{
    use Queueable, SerializesModels;
    protected $newsletter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->newsletter['title'],
        );
    }

    public function build()
    {
        $data = $this->newsletter;
        return $this->view('admin.mail_sale.mail_sale')
            ->with(['data' => $data]);
    }
}
