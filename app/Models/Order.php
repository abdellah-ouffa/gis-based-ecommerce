<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $customer_id
 * @property int $address_id
 * @property string $status
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 * @property Address $address
 * @property string $additionnal_information
 * @property Customer $customer
 * @property Product[] $products
 */
class Order extends Model
{
    // protected $appends = ['count_ordred_products'];

    // protected $with = ['products']; // load relationships with eger mode

    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'address_id', 'status', 'date', 'additionnal_information', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details')
                    ->as('OrderDetail')
                    ->withPivot('product_id', 'order_id', 'qte', 'created_at', 'updated_at');
    }

    /**
     * Get count of products ordered
     *
     * @return float
     */
    public function getCountOrdredProductsAttribute() {
        return $this->products->sum(function ($item) {
            return $item->OrderDetail->qte;
        });
    }

    /**
     * Get Customer Age At Ordered Time
     *
     * @return float
     */
    public function getCustomerAgeAtOrderedTimeAttribute() {
        return calcDateDiffYears($this->customer->birth_date, $this->date);
    }
}

