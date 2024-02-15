<?php

declare(strict_types=1);

namespace Modules\Shop\Models;

/**
 * Modules\Shop\Models\Reservation.
 *
 * @property int                             $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string                          $name
 * @property int                             $people_number
 * @property string                          $date_time
 * @property string                          $telephone_number
 * @property string|null                     $allergens
 * @property int|null                        $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   whereAllergens($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   whereDateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   wherePeopleNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   whereTelephoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation   whereUserId($value)
 * @method static \Modules\Shop\Database\Factories\ReservationFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
class Reservation extends BaseModel
{
    protected $fillable = ['name', 'people_number', 'date_time', 'telephone_number', 'allergens'];
}
