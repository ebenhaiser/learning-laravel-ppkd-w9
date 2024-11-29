<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id_customer', 'order_code', 'order_date', 'order_end', 'order_status', 'total_price'];
    protected $table = 'orders';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }
}
