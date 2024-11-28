<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id_customen', 'order_code', 'order_date', 'order_end', 'order_status'];
    protected $table = 'orders';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customen', 'id');
    }
}
