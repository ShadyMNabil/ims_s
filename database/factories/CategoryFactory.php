<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_active' => fake()->boolean(),
            'parent_id' => null,
            'name' => $name = fake()->unique()->word(),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(),
            'featured_image' => fake()->image(),
        ];
    }

    /**
     * Indicate that the category has parent.
     */
    public function child($parentId): CategoryFactory
    {
        return $this->state(fn(array $attributes) => [
            'parent_id' => $parentId,
        ]);
    }
}
