<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use App\Models\Order\DirectOrderItem;
use App\Models\Order\OrderItem;
use App\Models\Shopping\CartItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function League\Flysystem\has;

/**
 * App\Models\Product\Product
 *
 * @property int $id
 * @property int $category_id
 * @property string $numberModel
 * @property string $manufactureCompany
 * @property int $amount
 * @property float $price
 * @property int $alertAmount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read CartItem|null $cartItem
 * @property-read Category $category
 * @property-read \App\Models\Product\DeviceAttribute|null $deviceAttribute
 * @property-read \App\Models\Product\FrameAttribute|null $frameAttribute
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product\ProductImage> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\Product\LensesAttribute|null $lensesAttribute
 * @property-read OrderItem|null $orderItem
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAlertAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereManufactureCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNumberModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'numberModel',
        'manufactureCompany',
        'amount',
        'price',
        'alertAmount',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function frameAttribute()
    {
        return $this->hasOne(FrameAttribute::class);
    }

    public function lensesAttribute()
    {
        return $this->hasOne(LensesAttribute::class);
    }

    public function deviceAttribute()
    {
        return $this->hasOne(DeviceAttribute::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function cartItem()
    {
        return $this->hasOne(CartItem::class);
    }

    public function orderItem()
    {
        return $this->hasOne(OrderItem::class);
    }

    public function directOrderItem()
    {
        return $this->hasOne(DirectOrderItem::class);
    }
}
