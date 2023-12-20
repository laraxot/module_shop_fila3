<?php

declare(strict_types=1);

namespace Modules\Shop\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Shop\Models\Traits\HasAddresses;

/**
 * Modules\Shop\Models\Order.
 *
 * @property int                                                                             $id
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property string|null                                                                     $delivery_date
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Shop\Models\Address>     $addresses
 * @property int|null                                                                        $addresses_count
 * @property \Modules\Quaeris\Models\Customer|null                                           $currentTeam
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Quaeris\Models\Customer> $ownedTeams
 * @property int|null                                                                        $owned_teams_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Shop\Models\Product>     $products
 * @property int|null                                                                        $products_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Quaeris\Models\Customer> $teams
 * @property int|null                                                                        $teams_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Order   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order   query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order   whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order   whereUpdatedAt($value)
 * @method static \Modules\Shop\Database\Factories\OrderFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class Order extends BaseModel
{
    use HasAddresses;

    protected $fillable = [
        'delivery_date',
    ];

    public function products(): MorphToMany
    {
        $pivot_class = ProductMorph::class;
        $pivot = app($pivot_class);
        $pivot_table = $pivot->getTable();
        $pivot_fields = $pivot->getFillable();

        return $this->morphToMany(Product::class, 'model', $pivot_table)
            ->using($pivot_class)
            ->withPivot($pivot_fields)
            ->withTimestamps();
    }
}
