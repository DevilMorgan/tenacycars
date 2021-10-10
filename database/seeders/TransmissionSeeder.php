<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Transmission;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transmission::truncate();

        $data = [
            ['name' => 'Manual', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Automatic', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Both', 'created_at' => now(), 'updated_at' => now()],
        ];

        Transmission::insert($data);
    }
}
