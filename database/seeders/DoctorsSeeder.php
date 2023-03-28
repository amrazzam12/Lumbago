<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment\Doc;

class DoctorsSeeder extends Seeder
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
                'name' => fake()->name,
                'email' => fake()->safeEmail,
                'password' => Hash::make('123123123'),
                'age' => fake()->numberBetween(20 , 40),
                'phone_number' => fake()->phoneNumber,
                'years_of_experience' => fake()->numberBetween(0 , 20),
                'gender' => fake()->randomElement(['MALE' , 'FEMALE']),
                'speciality_id' => Speciality::first()->id ?? null,
            ] ,

            [
                'name' => fake()->name,
                'email' => fake()->safeEmail,
                'password' => Hash::make('123123123'),
                'age' => fake()->numberBetween(20 , 40),
                'phone_number' => fake()->phoneNumber,
                'years_of_experience' => fake()->numberBetween(0 , 20),
                'gender' => fake()->randomElement(['MALE' , 'FEMALE']),
                'speciality_id' => Speciality::first()->id ?? null,
            ] ,

            [
                'name' => fake()->name,
                'email' => fake()->safeEmail,
                'password' => Hash::make('123123123'),
                'age' => fake()->numberBetween(20 , 40),
                'phone_number' => fake()->phoneNumber,
                'years_of_experience' => fake()->numberBetween(0 , 20),
                'gender' => fake()->randomElement(['MALE' , 'FEMALE']),
                'speciality_id' => Speciality::first()->id ?? null,
            ]
        ];

        foreach ($data as $item) {
            Doctor::create($item);
        }
    }
}
