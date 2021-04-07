<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductInventory;
use App\Models\OrderItem;
use App\Models\Images;

class Product extends Model
{
    use HasFactory;

    /**
     * Update name of primary key
     *
     * @var string
     */

    protected $primaryKey = 'product_id';

    // Temporary
    protected $guarded = [];

    /**
     * Get all of the inventory for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventories()
    {
        return $this->hasMany(ProductInventory::class, 'product_id', 'product_id');
    }

    /**
     * Get all of the order items for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems() 
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'product_id');
    }

    public function media() 
    {
        return $this->morphMany(Images::class, 'object', 'object', 'object_id', 'product_id');
    }

}