<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $email;
    private $subjectt;
    private $message;

    /**
     * @param $name
     * @param $email
     * @param $subjectt
     * @param $message
     */
    public function __construct($name, $email, $subjectt, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subjectt = $subjectt;
        $this->message = $message;
    }
    /**
     * Create a new message instance.
     */


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "$this->subjectt",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contactMail',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
