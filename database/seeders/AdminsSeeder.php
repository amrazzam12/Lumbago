<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
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
            'name' => 'Farida Amgad',
            'email' => 'faridaamgad@gmail.com',
            'password' => Hash::make('123123123')
          ],
          [
            'name' => 'Alyaa Keshta',
            'email' => 'alyaakeshta@gmail.com',
            'password' => Hash::make('123123123')
          ],
          [
            'name' => 'Rawan Ezzat',
            'email' => 'rawanezzat@gmail.com',
            'password' => Hash::make('123123123')
          ],
          [
            'name' => 'Nadeen Serag',
            'email' => 'nadeenserag@gmail.com',
            'password' => Hash::make('123123123')
          ],
          [
            'name' => 'Mahy Kamal',
            'email' => 'mahykamal@gmail.com',
            'password' => Hash::make('123123123')
          ],
          [
            'name' => 'Manar Magdy',
            'email' => 'manarmagdy@gmail.com',
            'password' => Hash::make('123123123')
          ],

          [
            'name' => 'Muhamed Emad',
            'email' => 'muhamedemad@gmail.com',
            'password' => Hash::make('123123123')
          ],
          [
            'name' => 'Muhamed Ehab',
            'email' => 'muhamedehab@gmail.com',
            'password' => Hash::make('123123123')
          ],
          [
            'name' => 'Abdelrahman Yossef',
            'email' => 'abdoyossef@gmail.com',
            'password' => Hash::make('123123123')
         ],
         [
            'name' => 'Amr Azzam',
            'email' => 'amrazzm@gmail.com',
            'password' => Hash::make('123123123')
         ],
        ];

        foreach ($data as $item){
            Admin::create($item);
        }
    }
}
