<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Shop\Models\Category;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateCategoriesTable.
 */
class CreateShopCategoriesTable extends XotBaseMigration
{
    protected ?string $model_class = Category::class;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table): void {
                $table->id();
                $table->timestamps();

                $table->string('name');
                $table->string('slug');
                $table->integer('order_column')->nullable();
                $table->integer('featured_image_id')->nullable();
                $table->boolean('is_hidden')->default(false);
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('current_team_id')) {
                //    $table->foreignId('current_team_id')->nullable();
                // }
                // if (! $this->hasColumn('profile_photo_path')) {
                //    $table->string('profile_photo_path', 2048)->nullable();
                // }
            }
        );
    }
}
