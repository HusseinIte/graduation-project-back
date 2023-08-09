<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product\FrameAttribute
 *
 * @property int $id
 * @property int $product_id
 * @property string $frameType
 * @property int $size
 * @property int $arm
 * @property int $bridge
 * @property string $frameShape
 * @property string $frameClass
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute whereArm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute whereBridge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute whereFrameClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute whereFrameShape($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute whereFrameType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FrameAttribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FrameAttribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'frameType',
        'size',
        'arm',
        'bridge',
        'frameShape',
        'frameClass',
        'color'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
