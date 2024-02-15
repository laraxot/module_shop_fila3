<?php

declare(strict_types=1);

namespace Modules\Shop\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;

/**
 * Modules\Shop\Models\OrderMorph.
 *
 * @property int                             $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $model_type
 * @property int|null                        $model_id
 * @property int                             $order_id
 * @property int|null                        $user_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMorph newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMorph newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMorph query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMorph whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMorph whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMorph whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMorph whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMorph whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMorph whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMorph whereUserId($value)
 *
 * @mixin \Eloquent
 */
class OrderMorph extends MorphPivot
{
    /**
     * @var string
     */
    protected $connection = 'shop';
}
