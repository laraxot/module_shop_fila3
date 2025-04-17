<?php

declare(strict_types=1);

namespace Modules\Shop\Models;

/**
 * Modules\Shop\Models\Table.
 *
 * @property int                             $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string                          $name
 * @property int|null                        $seats
 * @property string|null                     $zone
 * @property float|null                      $x
 * @property float|null                      $y
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Table   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Table   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Table   query()
 * @method static \Illuminate\Database\Eloquent\Builder|Table   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table   whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table   whereSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table   whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table   whereX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table   whereY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table   whereZone($value)
 * @method static \Modules\Shop\Database\Factories\TableFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class Table extends BaseModel
{
    protected $fillable = ['name', 'seats', 'zone', 'x', 'y'];
}
