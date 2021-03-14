<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductInventory extends Model
{
    use HasFactory;

    /**
     * Update name of primary key
     *
     * @var string
     */

    protected $primaryKey = 'product_inventory_id';

    // Temporary
    protected $guarded = [];

    /**
     * Get the product that owns the ProductInventory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
