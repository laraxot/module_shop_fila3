<?php

declare(strict_types=1);

namespace Modules\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shop\Models\Order;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        ];
    }
}
