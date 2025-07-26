<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accessoriesSet()
    {
        return $this->belongsTo(Ring::class, 'product_id');
    }

    public function bracelet()
    {
        return $this->belongsTo(Bracelet::class, 'product_id');
    }
    public function ring()
    {
        return $this->belongsTo(Ring::class, 'product_id');
    }

    public function earring()
    {
        return $this->belongsTo(Bracelet::class, 'product_id');
    }
    public function necklace()
    {
        return $this->belongsTo(Bracelet::class, 'product_id');
    }
    public function product()
    {
        return match ($this->product_type) {
            'ring' => $this->belongsTo(Ring::class, 'product_id'),
            'bracelet' => $this->belongsTo(Bracelet::class, 'product_id'),
            'necklace' => $this->belongsTo(Necklace::class, 'product_id'),
            'earring' => $this->belongsTo(Earring::class, 'product_id'),
            'set' => $this->belongsTo(AccessoriesSet::class, 'product_id'),
            default => null,
        };
    }
}
