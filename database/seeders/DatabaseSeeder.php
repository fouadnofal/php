<?php

namespace Database\Seeders;

use App\Models\Meeting;
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
        $this->call([MeetingSeeder::class]);
        Meeting::factory(10)->create();
        $this->call([UserSeeder::class]);
        User::factory(10)->create();
    }
}
