<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);

        Article::create([
            'user_id' => $user->id,
            'title' => 'Welcome! this is my first project!!',
            'content' => 'To login use the following credentials email: admin@admin.com password: password',
        ])->addCategory('Info')->addTag('PHP')->addTag('Laravel');

        Article::factory(14)->create();
    }
}
