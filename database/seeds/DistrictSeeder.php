<?php

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
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
                'name' => 'Cầu Giấy',
                'slug' => 'cau-giay',
            ],
            [
                'name' => 'Hoàn Kiếm',
                'slug' => 'hoan-kiem',
            ],
            [
                'name' => 'Ba Đình',
                'slug' => 'ba-dinh',
            ],
            [
                'name' => 'Đống Đa',
                'slug' => 'dong-da',
            ],
            [
                'name' => 'Hai Bà Trưng',
                'slug' => 'hai-ba-trung',
            ],
            [
                'name' => 'Thanh Xuân',
                'slug' => 'thanh-xuan',
            ],
            [
                'name' => 'Long Biên',
                'slug' => 'long-bien',
            ],
            [
                'name' => 'Nam Từ Liêm',
                'slug' => 'nam-tu-liem',
            ],
            [
                'name' => 'Tây Hồ',
                'slug' => 'tay-ho',
            ],
            [
                'name' => 'Hà Đông',
                'slug' => 'ha-dong',
            ]
        ];
        foreach($datas as $data){
            $district =  District::create($data);
        }
    }
}
