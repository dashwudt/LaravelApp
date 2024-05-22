<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacationSpotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define your vacation spots data
        $vacationSpots = [
            ['name' => 'Shrek swamp', 'latitude' => '25.790654', 'longitude' => '-80.1300455'],
            ['name' => 'Good place', 'latitude' => '15.140654', 'longitude' => '-30.1300455'],
            ['name' => 'Second cheapest place', 'latitude' => '55.140654', 'longitude' => '-101.1300455'],
            ['name' => 'Altay', 'latitude' => '39.7392358', 'longitude' => '-104.990251'],
            // Add more vacation spots here...
        ];

        // Insert vacation spots data into the 'vacation_spots' table
        foreach ($vacationSpots as $spot) {
            DB::table('vacation_spots')->insert([
                'name' => $spot['name'],
                'latitude' => $spot['latitude'],
                'longitude' => $spot['longitude'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
