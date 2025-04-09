<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $casts = [
        'related_products' => 'array',
    ];

    protected static function booted()
    {
        // cancello l'immagine quando viene cancellato il prodotto
        static::deleting(function ($product) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        });
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function getRelatedProductObjectsAttribute()
    {
        return Product::whereIn('id', $this->related_products ?? [])->get();
    }

    public function getFormattedPriceAttribute(){
        return number_format($this->price, 2, ',', '.');
    }

    public function unitPriceBasedQuantity(int $quantity){
        $unitPrice = $this->price;
        foreach($this->variants()->get() as $variant){
            if($quantity >= $variant->from_qty){
                $unitPrice = $variant->unit_price;
            }
        }
        return $unitPrice;
    }

    public function getMinQtyForCustomizationAttribute()
    {
        $variant = $this->variants->where('enable_customization', true)->first();
        if ($variant) {
            return $variant->from_qty;
        }
        return false;
    }
}
