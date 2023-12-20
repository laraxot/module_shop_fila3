<?php

declare(strict_types=1);

namespace Modules\Shop\Models\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Shop\Models\Order;
use Modules\Shop\Models\OrderMorph;

trait HasOrders
{
    public function orders(): MorphToMany
    {
        $pivot_class = OrderMorph::class;
        $pivot = app($pivot_class);
        $pivot_table = $pivot->getTable();
        $pivot_fields = $pivot->getFillable();

        return $this->morphToMany(Order::class, 'model', $pivot_table)
            ->using($pivot_class)
            ->withPivot($pivot_fields)
            ->withTimestamps();
    }
}
