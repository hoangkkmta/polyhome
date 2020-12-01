<?php

use App\Models\Utility;
use Illuminate\Database\Seeder;

class UtilitySeeder extends Seeder
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
                'name' => 'Giường ngủ',
                'icon' => 'utility/bed.png',
                'type' => 'room',
            ],
            [
                'name' => 'Tủ đồ',
                'icon' => 'utility/wardrobe.png',
                'type' => 'room',
            ],
            [
                'name' => 'Điều hòa',
                'icon' => 'utility/air-conditioner.png',
                'type' => 'room',
            ],
            [
                'name' => 'Bàn ghế',
                'icon' => 'utility/chair.png',
                'type' => 'room',
            ],
            [
                'name' => 'Thiết bị vệ sinh',
                'icon' => 'utility/shower.png',
                'type' => 'room',
            ],
            [
                'name' => 'Mạng Wifi',
                'icon' => 'utility/wifi.png',
                'type' => 'room',
            ],
            [
                'name' => 'Bàn bếp',
                'icon' => 'utility/teppanyaki.png',
                'type' => 'room',
            ],
            [
                'name' => 'Tủ bếp',
                'icon' => 'utility/kitchen.png',
                'type' => 'room',
            ],
            [
                'name' => 'Quạt điện',
                'icon' => 'utility/fan.png',
                'type' => 'room',
            ],
            [
                'name' => 'Rèm cửa',
                'icon' => 'utility/stage.png',
                'type' => 'room',
            ],
            [
                'name' => 'Bình nóng lạnh',
                'icon' => 'utility/heater.png',
                'type' => 'room',
            ],
            [
                'name' => 'Ban công',
                'icon' => 'utility/antique-balcony.png',
                'type' => 'room',
            ],
            [
                'name' => 'Máy giặt',
                'icon' => 'utility/washing-machine.png',
                'type' => 'building',
            ],
            [
                'name' => 'Thang máy',
                'icon' => 'utility/elevator.png',
                'type' => 'building',
            ],
            [
                'name' => 'Camera',
                'icon' => 'utility/cctv.png',
                'type' => 'building',
            ],
            [
                'name' => 'Khóa vân tay',
                'icon' => 'utility/fingerprint.png',
                'type' => 'building',
            ],
            [
                'name' => 'Thang bộ',
                'icon' => 'utility/stairs.png',
                'type' => 'building',
            ],
            [
                'name' => 'Khu để xe',
                'icon' => 'utility/parking-sign.png',
                'type' => 'building',
            ],
            [
                'name' => 'Thiết bị PCCC',
                'icon' => 'utility/extinguisher.png',
                'type' => 'building',
            ],
            [
                'name' => 'Khu phơi đồ',
                'icon' => 'utility/costume-clothes.png',
                'type' => 'building',
            ],
            [
                'name' => 'Giờ giấc tự do',
                'icon' => 'utility/24-hours.png',
                'type' => 'building',
            ],
            [
                'name' => 'Không chung chủ',
                'icon' => 'utility/leadership.png',
                'type' => 'building',
            ],
        ];
        foreach($datas as $data){
            $building =  Utility::create($data);
        }
    }
}
