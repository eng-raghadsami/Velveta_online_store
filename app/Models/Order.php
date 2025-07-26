<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    // الطلب يخص مستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // الطلب يحتوي على منتجات (عبر order_items)
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // الطلب يحتوي على دفعة واحدة
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}

