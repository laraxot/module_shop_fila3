<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateProductsTable.
 */
class CreateProductsTable extends XotBaseMigration
{
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
                $table->text('description')->nullable();
                // TO-DO: questo è di default ma si può cambiare dalla pivot
                $table->decimal('price')->nullable();
                $table->integer('user_id')->nullable()->index();
                $table->string('slug');
                $table->integer('order_column')->nullable();
                $table->integer('featured_image_id')->nullable();
                $table->decimal('weight')->default(0);
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
