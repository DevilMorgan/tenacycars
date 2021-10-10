<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::truncate();

        $data = [
            ['name' => 'White', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Black', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Green', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Silver', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grey', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blue', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Golden', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Yellow', 'created_at' => now(), 'updated_at' => now()],
        ];

        Color::insert($data);
    }
}
