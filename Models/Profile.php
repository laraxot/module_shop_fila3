<?php

declare(strict_types=1);

namespace Modules\Shop\Models;

// --------- models --------
use GeneaLabs\LaravelModelCaching\CachedBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\LU\Models\Traits\HasProfileTrait;
use Modules\RealEstate\Models\BaseModel;
use Modules\User\Models\Permission;
// --- TRAITS ---
use Modules\User\Models\Role;
use Modules\User\Models\Traits\IsProfileTrait;
use Modules\User\Models\User;
use Modules\Xot\Contracts\ModelProfileContract;
// use Modules\Xot\Models\Traits\WidgetTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * Modules\RealEstate\Models\Profile.
 *
 * @property Collection<int, \Modules\Quaeris\Models\Customer> $customers
 * @property int|null                                          $customers_count
 * @property string|null                                       $first_name
 * @property string|null                                       $last_name
 * @property string|null                                       $full_name
 * @property Collection<int, Permission>                       $permissions
 * @property int|null                                          $permissions_count
 * @property Collection<int, Role>                             $roles
 * @property int|null                                          $roles_count
 * @property User|null                                         $user
 *
 * @method static CachedBuilder|Profile                                  all($columns = [])
 * @method static CachedBuilder|Profile                                  avg($column)
 * @method static CachedBuilder|Profile                                  cache(array $tags = [])
 * @method static CachedBuilder|Profile                                  cachedValue(array $arguments, string $cacheKey)
 * @method static CachedBuilder|Profile                                  count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BaseModel disableCache()
 * @method static CachedBuilder|Profile                                  disableModelCaching()
 * @method static CachedBuilder|Profile                                  exists()
 * @method static CachedBuilder|Profile                                  flushCache(array $tags = [])
 * @method static CachedBuilder|Profile                                  getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static CachedBuilder|Profile                                  inRandomOrder($seed = '')
 * @method static CachedBuilder|Profile                                  insert(array $values)
 * @method static CachedBuilder|Profile                                  isCachable()
 * @method static CachedBuilder|Profile                                  max($column)
 * @method static CachedBuilder|Profile                                  min($column)
 * @method static CachedBuilder|Profile                                  newModelQuery()
 * @method static CachedBuilder|Profile                                  newQuery()
 * @method static CachedBuilder|Profile                                  permission($permissions)
 * @method static CachedBuilder|Profile                                  query()
 * @method static CachedBuilder|Profile                                  role($roles, $guard = null)
 * @method static CachedBuilder|Profile                                  sum($column)
 * @method static CachedBuilder|Profile                                  truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 *
 * @property int                             $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $updated_by
 * @property string|null                     $created_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class Profile extends BaseModel implements ModelProfileContract
{
    // use PrivacyTrait;
    use HasFactory;
    use HasRoles;
    // use GeoTrait;
    // use HasProfileTrait;
    use IsProfileTrait;

    // use WidgetTrait;

    // protected $connection = 'quaeris';

    /**
     * @var string[]
     */
    protected $fillable = ['id',
        'user_id',
        'phone',
        'email',
        'bio',
        'first_name', 'last_name',
    ];

    // ------- RELATIONSHIP ----------
}// end model
