<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'header' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            Comment::factory(10)->create([
                'post_id' => $post->id,
            ]);
        });
    }
}
