<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property float $price
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 * @property Order[] $orders
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category_id', 'name', 'slug', 'description', 'price', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details')
                    ->as('OrderDetail')
                    ->withPivot('product_id', 'order_id', 'qte', 'created_at', 'updated_at');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'model_id')->where('type', '=', 'product');
    }    

    public function getImagePathAttribute()
    {
        return "storage/" . ($this->images()->first()->path ?? "product-images/default-product-image.jpg"); 
    }

    public function getRelatedProductsAttribute()
    {
        return $this->category->products()->where('id', '<>', $this->id)->get();
    }
}
