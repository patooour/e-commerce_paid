<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $limit = $this->faker->numberBetween(1, 100);
        $time_used = $this->faker->numberBetween(1, $limit);

        return [
            'code'=>$this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'discount'=>$this->faker->numberBetween(10,50),
            'discount_percentage'=>$this->faker->numberBetween(10,50),
            'is_active'=>$this->faker->boolean(80),

            'start_at' =>  now()->addDays(random_int(1, 4)),
            'end_at'   =>  now()->addDays(random_int(5, 10)),

            'limit'     =>        $limit,
            'time_used' =>        $time_used,

            'note'=>$this->faker->text(),

            'created_at'=>$this->faker->dateTimeBetween('-1 years','now'),
            'updated_at'=>$this->faker->dateTimeBetween('-1 years','now'),
        ];
    }
}
