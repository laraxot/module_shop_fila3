<?php

declare(strict_types=1);

namespace Modules\Shop\Models\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Shop\Models\Address;
use Modules\Shop\Models\AddressMorph;

trait HasAddresses
{
    public function addresses(): MorphToMany
    {
        $pivot_class = AddressMorph::class;
        $pivot = app($pivot_class);
        $pivot_table = $pivot->getTable();
        $pivot_fields = $pivot->getFillable();

        return $this->morphToMany(Address::class, 'model', $pivot_table)
            ->using($pivot_class)
            ->withPivot($pivot_fields)
            ->withTimestamps();
    }
}
