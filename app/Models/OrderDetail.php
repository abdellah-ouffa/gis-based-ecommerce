<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property int $qte
 * @property string $created_at
 * @property string $updated_at
 * @property Order $order
 * @property Product $product
 */
class OrderDetail extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_id', 'order_id', 'qte', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
