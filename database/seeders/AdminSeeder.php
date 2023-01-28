<?php

namespace Database\Seeders;

use App\Http\Controllers\AdminController;
use App\Models\Admin;
use App\Models\admine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Hardik',
            'email' => 'admin@gmail.com',
            'password' =>Hash::make(1234),
        ]);

    }
}
