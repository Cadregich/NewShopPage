<?php

namespace Database\Factories;

use App\Models\Goods;
use App\Models\Mods;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Goods::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'mod_id' => Mods::all()->random()->id,
            'img' => $this->faker->imageUrl(),
            'price' => random_int(1, 5500)
        ];
    }
}
