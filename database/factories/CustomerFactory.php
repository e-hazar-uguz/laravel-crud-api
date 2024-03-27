<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Customer::class;

    public function definition(): array
    {
        //müşteri tipi olarak random bir şekilde P ve B olarak veritabanına eklenir
        //test verisi oluşturmak için kullanılır.
        $type = $this->faker->randomElement(['P','B']);
        $name = $type == 'P' ? $this->faker->name() : $this->faker->company();

        return [
            'name' =>  $name,
            'type' => $type,
            'email' => $this->faker->email(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postal_code' => $this->faker->postCode()
        ];
    }
}
