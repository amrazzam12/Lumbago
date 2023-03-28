<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClinicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'location' => fake()->text,
                'from_hour' => fake()->time,
                'to_hour' =>fake()->time,
                'price' => fake()->numberBetween(10 , 500),
                'workdays' => ["Saturday","Monday","Wednesday","Thursday"],
                'doctor_id' => Doctor::first()->id ?? 1
            ] , [
                'location' => fake()->text,
                'from_hour' => fake()->time,
                'to_hour' =>fake()->time,
                'price' => fake()->numberBetween(10 , 500),
                'workdays' => ["Saturday","Monday","Wednesday","Thursday"],
                'doctor_id' => Doctor::first()->id ?? 1

            ],
            [
                'location' => fake()->text,
                'from_hour' => fake()->time,
                'to_hour' =>fake()->time,
                'price' => fake()->numberBetween(10 , 500),
                'workdays' => ["Saturday","Monday","Wednesday","Thursday"],
                'doctor_id' => Doctor::first()->id ?? 1

            ],
            [
                'location' => fake()->text,
                'from_hour' => fake()->time,
                'to_hour' =>fake()->time,
                'price' => fake()->numberBetween(10 , 500),
                'workdays' => ["Saturday","Monday","Wednesday","Thursday"],
                'doctor_id' => Doctor::first()->id ?? 1

            ],
            ];
        foreach ($data as $item){
            Clinic::create($item);
        }

    }
}
