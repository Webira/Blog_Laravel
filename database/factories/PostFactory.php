<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{/**
     * Define the model's default state.
     * @var string
     */
    protected $model=Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all()->pluck('id')->toArray();
        $categorys = Category::all()->pluck('id')->toArray();
        return [
            'title' => $this->faker->name(),
            'content' => $this->faker->text(),
            //'image' => 'https://via.placeholder.com/1000',
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'user_id' => $this->faker->randomElement($users),
            'category_id' => $this->faker->randomElement($categorys),         
        ];
    }
}
