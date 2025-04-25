<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $categories = [
            'Technology',
            'Health',
            'Science',
            'Sports',
            'Politics',
            'Entertainment',
            // 'Travel',
            // 'Business',
            // 'Food',
            // 'Fashion',
            // 'Art',
            // 'Music',
            // 'Lifestyle',
            // 'Environment',
            // 'Education',
            // 'History',
            // 'Culture',
            // 'Philosophy',
            // 'Psychology',
            // 'Society',
            // 'Economics',
            // 'Law',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }

        Post::factory(100)->create();
    }
}
