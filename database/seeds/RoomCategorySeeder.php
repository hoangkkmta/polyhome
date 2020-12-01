<?php

use App\Models\RoomCategory;
use Illuminate\Database\Seeder;

class RoomCategorySeeder extends Seeder
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
                'name' => 'Phòng 1 ngủ',
            ],
            [
                'name' => '1 khách - 1 ngủ',
            ],
            [
                'name' => '1 khách - 2 ngủ',
            ],
        ];
        foreach($datas as $data){
            $roomCategory =  RoomCategory::create($data);
        }
    }
}
