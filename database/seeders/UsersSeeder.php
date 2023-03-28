<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
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
                'gender' => fake()->randomElement(['MALE' , 'FEMALE']),
            ] , [
                'name' => fake()->name,
                'email' => fake()->safeEmail,
                'password' => Hash::make('123123123'),
                'age' => fake()->numberBetween(20 , 40),
                'phone_number' => fake()->phoneNumber,
                'gender' => fake()->randomElement(['MALE' , 'FEMALE']),
            ] , [
                'name' => fake()->name,
                'email' => fake()->safeEmail,
                'password' => Hash::make('123123123'),
                'age' => fake()->numberBetween(20 , 40),
                'phone_number' => fake()->phoneNumber,
                'gender' => fake()->randomElement(['MALE' , 'FEMALE']),
            ] ,
        ];

        foreach ($data as $item) {
            User::create($item);
        }

    }
}
