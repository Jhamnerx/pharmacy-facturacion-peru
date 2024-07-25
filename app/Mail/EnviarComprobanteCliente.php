<?php

namespace App\Mail;

use App\Models\Ventas;
use App\Models\Empresa;
use Barryvdh\DomPDF\PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarComprobanteCliente extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $invoice;
    public $email;
    public $pdfBase64;
    public $empresa;
    /**
     * Create a new message instance.
     */
    public function __construct(
        Ventas $invoice,
        $email,
        PDF $pdf,
        Empresa $empresa
    ) {
        $this->invoice = $invoice;
        $this->email = $email;
        $this->pdfBase64 = base64_encode($pdf->output());
        $this->empresa = $empresa;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            //from: new Address($this->email, $this->invoice->cliente->razon_social),
            subject: $this->invoice->tipoComprobante->descripcion . ' ' . $this->invoice->serie . '-' . $this->invoice->correlativo . ' | ' . $this->empresa->nombre_comercial,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.ventas.invoice',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        // Siempre adjuntamos el PDF
        $pdfAttachment = Attachment::fromData(fn () =>
        base64_decode($this->pdfBase64), $this->invoice->tipo_comprobante_id !== '02' ? $this->invoice->nombre_xml . '.pdf' : $this->invoice->tipoComprobante->descripcion . ' ' . $this->invoice->serie_correlativo . '.pdf')
            ->withMime('application/pdf');

        // Verificamos y adjuntamos los otros archivos si existen
        if ($this->invoice->tipo_comprobante_id !== '02') {
            $xmlPath = '/xml/' . $this->invoice->nombre_xml . '.xml';
            $cdrPath = '/cdr/' . $this->invoice->nombre_cdr . '.zip';

            if (Storage::disk('facturacion')->exists($xmlPath)) {
                $attachments[] = Attachment::fromStorageDisk('facturacion', $xmlPath);
            }

            if (Storage::disk('facturacion')->exists($cdrPath)) {
                $attachments[] = Attachment::fromStorageDisk('facturacion', $cdrPath);
            }
        }

        // Añadimos el PDF a la lista de adjuntos
        $attachments[] = $pdfAttachment;

        return $attachments;
    }
}
