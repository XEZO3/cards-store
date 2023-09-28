<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'superadmin',
            'email' => 'sayroxcard@gmail.com',
            'password'=>bcrypt("admin"),
            'permession'=>"Admin",
            'phone_number'=>"0788"
        ]);
        \App\Models\siteInfo::create([
            'name'=>"name",
            'logo'=>"testing",
            'email'=>"email@email.com",
            'phone_number'=>"078887",
            'service'=>'service',
            'terms'=>"terms"

        ]);
    }
}
