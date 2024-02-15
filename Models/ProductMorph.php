<?php

declare(strict_types=1);

namespace Modules\Shop\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modules\Shop\Models\ProductMorph.
 *
 * @property int                             $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $model_type
 * @property int|null                        $model_id
 * @property int                             $product_id
 * @property int|null                        $user_id
 * @property string|null                     $option
 * @property string|null                     $type
 * @property Category|null                   $category
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   whereOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMorph   whereUserId($value)
 * @method static \Modules\Shop\Database\Factories\ProductMorphFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
class ProductMorph extends BaseMorphPivot
{
    protected $fillable = ['type'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'model_id')
            ->where('model_type', Category::class);
    }
}
