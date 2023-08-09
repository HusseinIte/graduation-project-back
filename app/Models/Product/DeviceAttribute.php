<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product\DeviceAttribute
 *
 * @property int $id
 * @property int $product_id
 * @property string $details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceAttribute whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceAttribute whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceAttribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DeviceAttribute extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'details'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
