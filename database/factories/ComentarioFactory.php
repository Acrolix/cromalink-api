<?php

namespace Database\Factories;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'publication_id' => Publicacion::all()->random()->id,
            'created_by' => User::all()->random()->id,
            'content' => $this->faker->text(rand(50, 200)),
        ];
    }
}
