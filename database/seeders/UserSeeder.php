<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fullName' => 'St George Church',           
            'userName' => 'superAdmin',           
            'email' => 'superAdmin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin'),
            'mobile'=> '01200000000', 
            'father'=> 'fr.boktor',
            'address'=> 'ElMinia',
            'dob' => '1980-10-13',
            'userRole'=> UserRole::SuperAdmin->value,
            'servant'=> 1,
            'meeting_id' => 1,
        ]);
    }
}
