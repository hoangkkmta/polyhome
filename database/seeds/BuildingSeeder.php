<?php

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'host_id' => '1',
                'name' => 'Số 12, Ngõ 88 Trần Duy Hưng',
                'slug' => 'so-12-ngo-88-tran-duy-hung',
                'image' => '["anh-1.jpg","anh-2.jpg","anh-3.jpg","anh-4.jpg"]',
                'electricity_price' => '3000',
                'water_price' => '15000',
                'internet_price' => '80000',
                'cleaning_price' => '30000',
                'elevator_price' => '0',
                'parking_price' => '0',
                'description' => 'mô tả',
                'district_id' => '1',
                'address' => 'Yên Hòa',
                'utility_id' => '',
                'school_id' => '2',
                'status' => 1,
            ],
            [
                'host_id' => '1',
                'name' => 'Số 88, Ngõ 317 Tây Sơn',
                'slug' => 'so-80-ngo-317-tay-son',
                'image' => '["anh-1.jpg","anh-2.jpg","anh-3.jpg","anh-4.jpg"]',
                'electricity_price' => '3000',
                'water_price' => '15000',
                'internet_price' => '80000',
                'cleaning_price' => '30000',
                'elevator_price' => '0',
                'parking_price' => '0',
                'description' => 'mô tả',
                'district_id' => '4',
                'address' => 'Ngã Tư Sở',
                'utility_id' => '',
                'school_id' => '4',
                'status' => 1,
            ],
            [
                'host_id' => '1',
                'name' => 'Số 12, Ngõ 88 Trần Duy Hưng',
                'slug' => 'so-12-ngo-88-tran-duy-hung',
                'image' => '["anh-1.jpg","anh-2.jpg","anh-3.jpg","anh-4.jpg"]',
                'electricity_price' => '3000',
                'water_price' => '15000',
                'internet_price' => '80000',
                'cleaning_price' => '30000',
                'elevator_price' => '0',
                'parking_price' => '0',
                'description' => 'mô tả',
                'district_id' => '1',
                'address' => 'Yên Hòa',
                'utility_id' => '',
                'school_id' => '2',
                'status' => 1,
            ],
            [
                'host_id' => '1',
                'name' => 'Số 88, Ngõ 317 Tây Sơn',
                'slug' => 'so-80-ngo-317-tay-son',
                'image' => '["anh-1.jpg","anh-2.jpg","anh-3.jpg","anh-4.jpg"]',
                'electricity_price' => '3000',
                'water_price' => '15000',
                'internet_price' => '80000',
                'cleaning_price' => '30000',
                'elevator_price' => '0',
                'parking_price' => '0',
                'description' => 'mô tả',
                'district_id' => '4',
                'address' => 'Ngã Tư Sở',
                'utility_id' => '',
                'school_id' => '4',
                'status' => 1,
            ],
        ];
        foreach($datas as $data){
            $building =  Building::create($data);
        }
    }
}
