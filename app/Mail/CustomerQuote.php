<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerQuote extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $quote;
    protected $customer;
    protected $newuser;
    protected $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($quote, $customer, $newuser, $password)
    {
        $this->quote = $quote;
        $this->customer = $customer;
        $this->newuser = $newuser;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Your Quote Reply',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.customer_quote',
            with: [
                'quote' => $this->quote,
                'customer' => $this->customer,
                'newuser' => $this->newuser,
                'password' => $this->password
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
