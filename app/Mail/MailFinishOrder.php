<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailFinishOrder extends Mailable
{
    use Queueable, SerializesModels;
    protected $order;
    protected $listServiceOrders;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $listServiceOrders)
    {
        $this->order = $order;
        $this->listServiceOrders = $listServiceOrders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Người Tìm Trọ - Trọ Tìm Người xin cảm ơn!')
        ->view('admin::mail.orderFinish', ['order' => $this->order, 'listServiceOrders' => $this->listServiceOrders]);
    }
}
