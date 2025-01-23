<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $root = Category::factory()->create([
            'is_active' => 1,
            'parent_id' => null,
            'name' => __('uncategorized'),
            'slug' => __('uncategorized'),
            'featured_image' => 'images/no_image.jpg',
        ]);

        $parentCategories = Category::factory(30)
            ->create([
                'parent_id' => $root->id
            ]);

        // Create randow child categories for bunch of parents
        $parentCategories->each(function ($parent) {
            Category::factory(rand(1, 5))
                ->child($parent->id)
                ->create();
        });
    }
}
