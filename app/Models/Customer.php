<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $tel
 * @property string $gender
 * @property string $birth_date
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Address[] $addresses
 * @property Order[] $orders
 */
class Customer extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'tel', 'gender', 'birth_date', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class, 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
