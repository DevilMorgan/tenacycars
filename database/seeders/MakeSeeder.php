<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Make;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Make::truncate();

        $data = [
            ['id' => 1, 'name' => 'Maruti Suzuki', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Hyundai', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Honda', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Tata', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Ford', 'created_at' => now(), 'updated_at' => now()],
        ];

        Make::insert($data);
    }
}
