<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\User::truncate();
      \App\Models\Post::truncate();
      \App\Models\Category::truncate(); // Pozwala uniknąć błędu kiedy użyjemy kilkukrotnie seed a jeden z parametrów ma być unikalny i w przypadku seedowania zostałby zduplikowany;

      \App\Models\Post::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
