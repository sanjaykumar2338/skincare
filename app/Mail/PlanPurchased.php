<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PlanPurchased extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $plan;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($plan, $user)
    {
        $this->plan = $plan;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Plan Purchased',
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
            view: 'emails.planpurchased',
            with: [
                'user' => $this->user,
                'plan' => $this->plan
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
