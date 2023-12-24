<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tittle' => $this->faker->sentence(mt_rand(2, 8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'body' => '<p>' . implode('</p>/p', $this->faker->paragraphs(mt_rand(5, 10))) . '</p>',
            'body' => collect($this->faker->paragraphs(mt_rand(10, 20)))
                ->map(
                    fn ($b) => "<p> $b </p>"
                )->implode(''),

            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 8)
        ];
    }
}
