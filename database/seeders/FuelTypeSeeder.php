<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\FuelType;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuelType::truncate();

        $data = [
            ['name' => 'Petrol', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Diesel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Electric', 'created_at' => now(), 'updated_at' => now()],
        ];

        FuelType::insert($data);
    }
}
