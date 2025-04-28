<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $name = 'Aled Brown';
        User::factory()->create([
            'name' => $name,
            'username' => Str::slug($name),
            'email' => 'aledb@mac.com',
        ]);

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

        // Post::factory(100)->create();
    }
}
