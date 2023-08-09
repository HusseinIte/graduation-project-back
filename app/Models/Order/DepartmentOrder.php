<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\Order\DepartmentOrder
 *
 * @property int $id
 * @property int $department_id
 * @property int $order_id
 * @property int $isExecute
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentOrder whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentOrder whereIsExecute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DepartmentOrder extends Pivot
{
    use HasFactory;
    public $incrementing = true;
}
