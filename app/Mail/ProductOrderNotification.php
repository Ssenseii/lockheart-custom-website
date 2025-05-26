<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductOrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $orderData;
    public $isCustomerCopy;

    /**
     * Create a new message instance.
     *
     * @param array $orderData
     * @param bool $isCustomerCopy
     */
    public function __construct(array $orderData, bool $isCustomerCopy = false)
    {
        $this->orderData = $orderData;
        $this->isCustomerCopy = $isCustomerCopy;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->isCustomerCopy
            ? 'Confirmation de votre commande de ' . $this->orderData['product']
            : 'Nouvelle commande de ' . $this->orderData['product'];

        return $this->subject($subject)
            ->view('emails.product-order')
            ->with([
                'order' => $this->orderData,
                'isCustomerCopy' => $this->isCustomerCopy,
            ]);
    }
}
