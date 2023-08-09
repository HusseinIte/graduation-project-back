<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product\LensesAttribute
 *
 * @property int $id
 * @property int $product_id
 * @property string $spherical
 * @property string $cylinder
 * @property string $lensesClass
 * @property string $classType
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|LensesAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LensesAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LensesAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|LensesAttribute whereClassType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LensesAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LensesAttribute whereCylinder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LensesAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LensesAttribute whereLensesClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LensesAttribute whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LensesAttribute whereSpherical($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LensesAttribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LensesAttribute extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'spherical',
        'cylinder',
        'lensesClass',
        'classType'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
