<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('permissions:sync');
        $this->call(RoleSeeder::class);


        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@domain.com',
            'password' => Hash::make('password')
        ]);

        $user->assignRole('admin');

        Book::factory(10)->create();


    }
}
