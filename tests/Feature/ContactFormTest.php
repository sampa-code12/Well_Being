<?php

namespace Tests\Feature;

use App\Mail\ContactSupportMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_contact_form_sends_support_email(): void
    {
        Mail::fake();

        $response = $this->post(route('contact.store'), [
            'name' => 'Amina',
            'email' => 'amina@example.com',
            'subject' => 'Besoin d’informations',
            'message' => 'Je souhaite rejoindre les programmes de bien-être.',
        ]);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success', 'Votre message a bien été envoyé. Nous vous répondrons rapidement.');

        Mail::assertSent(ContactSupportMail::class, function (ContactSupportMail $mail) {
            return $mail->hasTo(config('mail.from.address'))
                && $mail->hasReplyTo('amina@example.com');
        });
    }
}
