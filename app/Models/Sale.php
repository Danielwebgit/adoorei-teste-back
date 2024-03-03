<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    const STATUS_APPROVED_SALE = 'approdev';
    const STATUS_CANCELED_SALE = 'canceled';

    const MSG_SALE_NOT_FOUND = 'Venda não encontrada';
    const MSG_SALE_CANCELED = 'Venda cancelada com sucesso';
    const MSG_SALE_MADE = 'Venda realizada com sucesso';

    protected $fillable = ['amount', 'price_total', 'status'];

    protected $primaryKey = 'sale_id';

    public function items()
    {
        return $this->hasMany(SaleItem::class, 'sale_id', 'sale_id');
    }

}
