<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
             Admin::create([
        'name'=>'AdminUser',
        'email'=>'admin@gmail.com',
        'password'=>bcrypt('admin@123')
    ]);
    }
}
