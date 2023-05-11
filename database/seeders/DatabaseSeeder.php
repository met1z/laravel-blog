<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(4)->create();
        $this->command->info('Таблица пользователей загружена данными!');
        Post::factory()->count(20)->create();
        $this->command->info('Таблица постов блога загружена данными!');
    }
}
