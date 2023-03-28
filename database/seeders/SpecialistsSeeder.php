<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialistsSeeder extends Seeder
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
                'name' => 'Bones',
                'description' => 'Bones And Internal Body Components',
            ],

            [
                'name' => 'Normal Treatment',
                'description' => 'For Normal Treatment For Specific Patients',
            ],
        ];

        foreach ($data as $item){
            Speciality::create($item);
        }
    }
}
