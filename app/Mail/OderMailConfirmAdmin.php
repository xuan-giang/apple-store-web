<?php

namespace App\Mail;

use App\Models\OrderDetail;
use App\Models\OrderList;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class OderMailConfirmAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public OrderList $order;

    public $list_products;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderList, $list_products1)
    {
        $this->order = $orderList;
        $this->list_products = $list_products1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $customSubject = "Đơn hàng #".$this->order->id_order." của bạn đang được giao";
        return $this->subject($customSubject)->view('admin.mail.oder_confirm_admin');
    }
}
