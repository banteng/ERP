<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $permissions = [
            'Admin',
            'Master',
            'User'
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }

        Role::create(['name' => 'Master'])->givePermissionTo('Master');
        Role::create(['name' => 'Admin'])->givePermissionTo('Admin');
        Role::create(['name' => 'User'])->givePermissionTo('User');

        User::create([
            'name' => 'Master', 
            'email' => 'master@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Master');

        
        User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');


        User::create([
            'name' => 'User', 
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('User');
    }
}
