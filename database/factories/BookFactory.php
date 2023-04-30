<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'category_id' => Category::factory(),
            'author' => $this->faker->name(),
            'description' => $this->faker->realText(),
            'cover' => "https://picsum.photos/seed/{$this->faker->word()}/200/300",
            'rating' => $this->faker->randomElement([1, 2, 3, 4, 5])
        ];
    }
}
