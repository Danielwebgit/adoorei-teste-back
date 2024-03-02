<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    const STATUS_APPROVED_SALE = 'approdev';
    const STATUS_CANCELED_SALE = 'canceled';

    protected $fillable = ['amount', 'price_total', 'status'];

    public function items()
    {
        return $this->hasMany(SaleItem::class, 'sale_id', 'sale_id');
    }

}
