<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Product[] $products
 */
class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'model_id')->where('type', '=', 'category');
    }

    public function getImagePathAttribute()
    {
        $imagePath = $this->images()->first()->path;
        if (strpos($imagePath, 'https://lorempixel.com') !== false) {
            return $imagePath;
        }
        return "storage/" . ($imagePath ?? "category-images/default-category-image.jpg"); 
    }

    public function getCountProductsAttribute()
    {
        return $this->products()->count(); 
    }

    public function getCategoryProducdtsAttribute(){
        return $this->products->get();
    }
}


