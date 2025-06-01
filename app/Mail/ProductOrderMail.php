<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(array $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('Nouvelle commande de produit')
            ->view('emails.product_order');
    }
}
