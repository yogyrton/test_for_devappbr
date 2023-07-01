<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@mail.ru',
             'email_verified_at' => now(),
             'password' => Hash::make('11111'),
             'phone' => null,
             'index' => null,
             'address' => null,
             'role' => 1,
             'remember_token' => Str::random(10),
         ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);


    }
}
