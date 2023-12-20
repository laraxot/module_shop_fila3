<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Shop\Models\Customer;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateCustomersTable.
 */
class CreateShopCustomersTable extends XotBaseMigration
{
    protected ?string $model_class = Customer::class;

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
                $table->string('email');
                $table->string('phone');
                $table->string('address');
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
