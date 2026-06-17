<?php

namespace App\Mail;

use App\Models\Prestamo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PrestamoRegistrado extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Prestamo $prestamo) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Préstamo Registrado - ' . $this->prestamo->equipo->nombre,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.prestamo-registrado',
            with: [
                'prestamo' => $this->prestamo,
            ]
        );
    }
}