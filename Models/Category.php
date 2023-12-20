<?php

declare(strict_types=1);

namespace Modules\Shop\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\EloquentSortable\SortableTrait;

/**
 * Modules\Shop\Models\Category.
 *
 * @property int                                                                         $id
 * @property \Illuminate\Support\Carbon|null                                             $created_at
 * @property \Illuminate\Support\Carbon|null                                             $updated_at
 * @property string                                                                      $name
 * @property string                                                                      $slug
 * @property int|null                                                                    $order_column
 * @property int|null                                                                    $featured_image_id
 * @property bool                                                                        $is_hidden
 * @property Media|null                                                                  $featuredImage
 * @property string                                                                      $action
 * @property string                                                                      $action_text
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Shop\Models\Product> $products
 * @property int|null                                                                    $products_count
 *
 * @method static \Modules\Shop\Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category   ordered(string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Category   query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category   whereFeaturedImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category   whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category   whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category   whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category   whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category   whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Category extends BaseModel
{
    use SortableTrait;

    protected $fillable = [
        'name',
        'order_column',
        'is_hidden',
        'slug',
    ];

    protected $casts = [
        'is_hidden' => 'boolean',
    ];

    /**
     * @var array
     */
    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    public function featuredImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_image_id', 'id');
    }

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

    public function getActionAttribute(): string
    {
        return ' onClick=location.href=\''.route('{item2?}.index', ['container0' => 'categories', 'item0' => $this, 'container1' => 'products']).'\' ';
    }

    public function getActionTextAttribute(): string
    {
        return 'Apri Categoria';
    }
}
