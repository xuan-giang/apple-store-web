<?php

namespace App\Mail;

use App\Models\OrderDetail;
use App\Models\OrderList;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class OderMailCompleteAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public OrderList $bill;

    public $list_products;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderList, $list_products1)
    {
        $this->bill = $orderList;
        $this->list_products = $list_products1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Thông báo giao hàng thành công - đơn hàng #".$this->bill->id_order)->view('admin.mail.order_complete');
    }
}
