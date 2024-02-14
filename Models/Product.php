<?php

declare(strict_types=1);

namespace Modules\Shop\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Route;
use Spatie\EloquentSortable\SortableTrait;
use Webmozart\Assert\Assert;

/**
 * Modules\Shop\Models\Product.
 *
 * @property int                                                                             $id
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property string                                                                          $name
 * @property string|null                                                                     $description
 * @property string|null                                                                     $price
 * @property int|null                                                                        $user_id
 * @property string                                                                          $slug
 * @property int|null                                                                        $order_column
 * @property int|null                                                                        $featured_image_id
 * @property string                                                                          $weight
 * @property \Illuminate\Database\Eloquent\Collection<int, Product>                          $allergens
 * @property int|null                                                                        $allergens_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Shop\Models\Category>    $categories
 * @property int|null                                                                        $categories_count
 * @property \Modules\Quaeris\Models\Customer|null                                           $currentTeam
 * @property Media|null                                                                      $featuredImage
 * @property string                                                                          $action
 * @property string                                                                          $action_text
 * @property string                                                                          $second_action
 * @property string                                                                          $second_action_text
 * @property \Illuminate\Database\Eloquent\Collection<int, Product>                          $ingredients
 * @property int|null                                                                        $ingredients_count
 * @property \Illuminate\Database\Eloquent\Collection<int, Order>                            $orders
 * @property int|null                                                                        $orders_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Quaeris\Models\Customer> $ownedTeams
 * @property int|null                                                                        $owned_teams_count
 * @property \Illuminate\Database\Eloquent\Collection<int, ProductMorph>                     $productMorph
 * @property int|null                                                                        $product_morph_count
 * @property \Illuminate\Database\Eloquent\Collection<int, Product>                          $products
 * @property int|null                                                                        $products_count
 * @property \Illuminate\Database\Eloquent\Collection<int, Product>                          $subproducts
 * @property int|null                                                                        $subproducts_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Quaeris\Models\Customer> $teams
 * @property int|null                                                                        $teams_count
 * @property \Illuminate\Database\Eloquent\Collection<int, Product>                          $variations
 * @property int|null                                                                        $variations_count
 *
 * @method static Builder|Product                                 newModelQuery()
 * @method static Builder|Product                                 newQuery()
 * @method static Builder|Product                                 ofCategory(string $parent)
 * @method static Builder|Product                                 ofProduct(string $parent)
 * @method static Builder|Product                                 ordered(string $direction = 'asc')
 * @method static Builder|Product                                 query()
 * @method static Builder|Product                                 whereCreatedAt($value)
 * @method static Builder|Product                                 whereDescription($value)
 * @method static Builder|Product                                 whereFeaturedImageId($value)
 * @method static Builder|Product                                 whereId($value)
 * @method static Builder|Product                                 whereName($value)
 * @method static Builder|Product                                 whereOrderColumn($value)
 * @method static Builder|Product                                 wherePrice($value)
 * @method static Builder|Product                                 whereSlug($value)
 * @method static Builder|Product                                 whereUpdatedAt($value)
 * @method static Builder|Product                                 whereUserId($value)
 * @method static Builder|Product                                 whereWeight($value)
 * @method static \Modules\Shop\Database\Factories\ProductFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class Product extends BaseModel
{
    use SortableTrait;

    protected $fillable = [
        'name',
        'description',
        'price',
        'featured_image_id',
        'order_column',
        'weight',
        'slug',
    ];

    /**
     * @var array
     */
    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    // come identifico il padre da cui ho chiamato il figlio in una relazione morphTo, usando la relazione?
    // relations
    public function orders(): MorphToMany
    {
        $pivot_class = ProductMorph::class;
        $pivot = app($pivot_class);
        $pivot_table = $pivot->getTable();
        $pivot_fields = $pivot->getFillable();

        return $this->morphedByMany(Order::class, 'model', $pivot_table)
            ->using($pivot_class)
            ->withPivot($pivot_fields)
            ->withTimestamps();
    }

    public function subproducts(): MorphToMany
    {
        $pivot_class = ProductMorph::class;
        $pivot = app($pivot_class);
        $pivot_table = $pivot->getTable();
        $pivot_fields = $pivot->getFillable();

        return $this->morphToMany(Product::class, 'model', $pivot_table)
            ->using($pivot_class)
            ->withPivot($pivot_fields)
            ->withTimestamps();
        // ->wherePivot('type', 'component');
    }

    public function allergens(): MorphToMany
    {
        return $this->subproducts()->wherePivot('type', 'allergen');
    }

    public function ingredients(): MorphToMany
    {
        return $this->subproducts()->wherePivot('type', 'ingredient');
    }

    public function variations(): MorphToMany
    {
        return $this->subproducts()->wherePivot('type', 'variation');
    }

    public function productMorph(): HasMany
    {
        return $this->hasMany(ProductMorph::class, 'product_id', 'id')->where('model_type', Category::class);
    }

    public function categories(): MorphToMany
    {
        $pivot_class = ProductMorph::class;
        $pivot = app($pivot_class);
        $pivot_table = $pivot->getTable();
        $pivot_fields = $pivot->getFillable();

        return $this->morphedByMany(Category::class, 'model', $pivot_table)
            ->using($pivot_class)
            ->withPivot($pivot_fields)
            ->withTimestamps();
    }

    public function scopeOfCategory(Builder $query, string $parent): Builder
    {
        return $query->whereHas('categories', function ($query) use ($parent) {
            $query->where('categories.id', $parent);
        });
    }

    // inversa delle varianti
    public function products(): MorphToMany
    {
        $pivot_class = ProductMorph::class;
        $pivot = app($pivot_class);
        $pivot_table = $pivot->getTable();
        $pivot_fields = $pivot->getFillable();

        return $this->morphedByMany(Product::class, 'model', $pivot_table)
            ->using($pivot_class)
            ->withPivot($pivot_fields)
            ->withTimestamps();
    }

    public function scopeOfProduct(Builder $query, string $parent): Builder
    {
        return $query->whereHas('products', function ($query) use ($parent) {
            $query->where('product.id', $parent);
        });
    }

    //public function featuredImage(): BelongsTo
    //{
    //    return $this->belongsTo(Media::class, 'featured_image_id', 'id');
    //}

    // ------------------------ mutators -------------------------------

    public function getActionTextAttribute(): string
    {
        return 'Aggiungi al Carrello';
    }

    public function getActionAttribute(): string
    {
        return ' wire:click="$dispatch(\'add-item-to-cart\', { product_id: \''.$this->id.'\' })"';
    }

    public function getSecondActionTextAttribute(): string
    {
        return 'Vedi Ingredienti';
    }

    public function getSecondActionAttribute(): string
    {
        Assert::notNull(Route::current());
        $item0 = Route::current()->parameter('item0');

        return ' wire:click="$dispatch(\'ingredients-list\', { product_id: \''.$this->id.'\' })"';
    }
}
