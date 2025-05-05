<?php

namespace App\Models;

use App\Enum\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orderRows()
    {
        return $this->hasMany(OrderRow::class, 'order_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function getOrderStatusAttribute()
    {
        return OrderStatus::from($this->status)->label();
    }

    public static function getNextInvoiceNumber()
    {
        $lastOrder = Order::orderBy('id', 'desc')->first();

        // controllo se l'anno dell'ultimo ordine è cambiato, in tal caso riparto da 1
        if($lastOrder && $lastOrder->created_at->year != now()->year){
            return 1;
        }

        // controllo il numero d'ordine dell'ultimo record inserito e lo incremento di 1
        return $lastOrder ? $lastOrder->order_number + 1 : 1;
    }

    public function getFormattedOrderNumberAttribute(){
        return '#' . $this->order_number . " / " . $this->created_at->format('Y');
    }

    public function getFormattedTotalAttribute(){
        return number_format($this->total, 2, ',', '.');
    }
}
