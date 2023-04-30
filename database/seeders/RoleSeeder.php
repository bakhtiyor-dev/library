<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'staff', 'reader'];
        $roles = collect($roles)->map(fn($role) => ['name' => $role, 'guard_name' => 'web']);

        Role::query()->insert($roles->toArray());

    }
}
