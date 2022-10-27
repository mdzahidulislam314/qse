<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const STATUS_PENDING = 1;
    const STATUS_ACCEPTED = 5;
    const STATUS_PROCESSING = 2;
    const STATUS_COMPLETE = 3;
    const STATUS_CANCELLED = 4;

    const PAYMENT_STATUS_UNPAID = 1;
    const PAYMENT_STATUS_PARTIAL = 2;
    const PAYMENT_STATUS_PAID = 3;

    protected $fillable = [
        'customer_id', 'billing_email', 'billing_name', 'billing_address','shipping_address', 'shipping_method','order_status','payment_status',
        'payment_method', 'billing_postalcode', 'billing_phone', 'billing_name_on_card', 'billing_discount',
        'billing_discount_code', 'billing_subtotal', 'billing_tax', 'billing_total', 'shipping_cost', 'error','order_id','invoice_no',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity','price');
    }

    // util
    public function statusHtml()
    {
        $html = '';
        switch ($this->order_status) {
            case self::STATUS_PENDING:
                $html = '<span class="label label-warning">Pending</span>';
                break;
            case self::STATUS_CANCELLED:
                $html = '<span class="label label-danger">Cancelled</span>';
                break;
            case self::STATUS_COMPLETE:
                $html = '<span class="label label-success">Complete</span>';
                break;
            case self::STATUS_PROCESSING:
                $html = '<span class="label label-primary">Processing</span>';
                break;
            case self::STATUS_ACCEPTED:
                $html = '<span class="label label-info">Accepted</span>';
                break;
        }
        return $html;
    }

    public function paymentStatusHtml()
    {
        $html = '';
        switch ($this->payment_status) {
            case self::PAYMENT_STATUS_UNPAID:
                $html = '<span class="label label-warning">Unpaid</span>';
                break;
            case self::PAYMENT_STATUS_PARTIAL:
                $html = '<span class="label label-info">Partially paid</span>';
                break;
            case self::PAYMENT_STATUS_PAID:
                $html = '<span class="label label-success">Paid</span>';
                break;
        }
        return $html;
    }
}
