<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ContactSupportMail extends Mailable
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $message,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('app.name')),
            to: [new Address(config('mail.from.address'), 'Support Well Being')],
            replyTo: [new Address($this->email, $this->name)],
            subject: 'Nouveau message de contact',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact.support',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message,
            ],
        );
    }
}
