<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerQuoteUpdate extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $quote;
    protected $customer;
    protected $quote_proposal;
    protected $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($quote, $customer, $quote_proposal, $title)
    {
        $this->quote = $quote;
        $this->customer = $customer;
        $this->quote_proposal = $quote_proposal;
        $this->title = $title;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->title
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
            view: 'emails.quote_update',
            with: [
                'quote' => $this->quote,
                'customer' => $this->customer,
                'quote_proposal' => $this->quote_proposal,
                'title' => $this->title
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
