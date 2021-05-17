<?php

namespace Database\Factories;

use App\Models\Tienda;
use App\Models\Trabajador;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrabajadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trabajador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tiendas=Tienda::all('id');
        return [
            'nombre'=>$this->faker->firstName(),
            'apellidos'=>$this->faker->lastName." ".$this->faker->lastName,
            'email'=>$this->faker->unique()->freeEmail,
            'tienda_id'=>$tiendas->get(rand(0, count($tiendas)-1))
        ];
    }
}
