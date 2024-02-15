<?php

declare(strict_types=1);

namespace Modules\Shop\Models;

/**
 * Modules\Shop\Models\Customer.
 *
 * @property int                             $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string                          $name
 * @property string                          $email
 * @property string                          $phone
 * @property string                          $address
 * @method static \Illuminate\Database\Eloquent\Builder|Customer   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer   query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer   whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer   whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer   whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer   wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer   whereUpdatedAt($value)
 * @method static \Modules\Shop\Database\Factories\CustomerFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
class Customer extends BaseModel
{
    protected $fillable = [''];
}
