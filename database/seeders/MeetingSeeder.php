<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meeting;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meeting::create([
            'meetingName' => 'System',           
            'meetingTime' => '10:00',           
            'meetingPlace' => 'NA',
            'userID' => 1,
        ]);
    }
}
