<?php

declare(strict_types=1);

namespace Modules\Shop\Models;

/**
 * Modules\Shop\Models\Address.
 *
 * @property string $full_address
 * @method static \Modules\Shop\Database\Factories\AddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Address   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address   query()
 * @property int                             $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $nation
 * @property string|null                     $region
 * @property string|null                     $province
 * @property string|null                     $municipality
 * @property string|null                     $street
 * @property string|null                     $postal_code
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereMunicipality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereNation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Address extends BaseModel
{
    protected $fillable = [
        'nation',
        'region',
        'province',
        'municipality',
        'street',
        'postal_code',
    ];

    public function getFullAddressAttribute(): string
    {
        return $this->street.' - '.$this->municipality.' ('.$this->province.')';
    }
}
