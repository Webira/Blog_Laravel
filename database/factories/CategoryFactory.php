<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     * @var string
     */
    protected $model=Category::class;

    /**public function newModel(array $attributes =[]){
        $model = $this->Category();
        return new $model($attributes);
    }*/
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
        ];
    }
}
