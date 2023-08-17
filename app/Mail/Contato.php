<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Contato extends Mailable
{
    use Queueable, SerializesModels;
    private $contato;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Contato $contato)
    {
        $this->contato = $contato;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: '[Igreja Presbiteriana de Sapucaia do Sul] '.$this->contato->nome,
            to: [$this->contato->email, 'giordani.santos.silveira@gmail.com', 'everton100177@gmail.com'],
            replyTo: [
                $this->contato->email,
            ],
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
            view: 'emails.contato',
            with: [
                'contato' => $this->contato
            ],
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
