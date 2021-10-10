<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\CarModel;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarModel::truncate();

        $data = [
            ['id' => 1, 'name' => 'Maruti Suzuki', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Hyundai', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Honda', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Tata', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Ford', 'created_at' => now(), 'updated_at' => now()],
        ];

        $data = [
            ['make_id' => 1, 'name' => 'Swift', 'created_at' => now(), 'updated_at' => now()],
            ['make_id' => 1, 'name' => 'Vitara Brezza', 'created_at' => now(), 'updated_at' => now()],
            ['make_id' => 2, 'name' => 'i10', 'created_at' => now(), 'updated_at' => now()],
            ['make_id' => 2, 'name' => 'i20', 'created_at' => now(), 'updated_at' => now()],
            ['make_id' => 3, 'name' => 'City', 'created_at' => now(), 'updated_at' => now()],
            ['make_id' => 3, 'name' => 'Amaze', 'created_at' => now(), 'updated_at' => now()],
            ['make_id' => 4, 'name' => 'Nano', 'created_at' => now(), 'updated_at' => now()],
            ['make_id' => 4, 'name' => 'Indica', 'created_at' => now(), 'updated_at' => now()],
            ['make_id' => 5, 'name' => 'Figo', 'created_at' => now(), 'updated_at' => now()],
            ['make_id' => 5, 'name' => 'EcoSport', 'created_at' => now(), 'updated_at' => now()],
        ];

        CarModel::insert($data);
    }
}
