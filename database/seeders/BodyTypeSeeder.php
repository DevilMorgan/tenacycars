<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\BodyType;

class BodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BodyType::truncate();

        $data = [
            ['name' => 'Hatchback', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sedan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SUV', 'created_at' => now(), 'updated_at' => now()],
        ];

        BodyType::insert($data);
    }
}
