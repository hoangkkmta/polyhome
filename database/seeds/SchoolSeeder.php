<?php

use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
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
                'name' => 'Đại học Bách Khoa Hà Nội',
                'slug' => 'dai-hoc-back-khoa-ha-noi',
            ],
            [
                'name' => 'Đại học Luật Hà Nội',
                'slug' => 'dai-hoc-luat-ha-noi',
            ],
            [
                'name' => 'Đại học Xây Dựng Hà Nội',
                'slug' => 'dai-hoc-xay-dung-ha-noi',
            ],
            [
                'name' => 'Đại học Thủy Lợi',
                'slug' => 'dai-hoc-thuy-loi',
            ],
            [
                'name' => 'Đại học Kiến Trúc Hà Nội',
                'slug' => 'dai-hoc-kien-truc-ha-noi',
            ],
            [
                'name' => 'Đại học Sư Phạm Hà Nội',
                'slug' => 'dai-hoc-su-pham-ha-noi',
            ],
            [
                'name' => 'Đại học Thương Mại',
                'slug' => 'dai-hoc-thuong-mai',
            ],
            [
                'name' => 'Đại học Kinh Tế Quốc Dân',
                'slug' => 'dai-hoc-kinh-te-quoc-dan',
            ],
            [
                'name' => 'Đại học Quốc Gia Hà Nội',
                'slug' => 'dai-hoc-quoc-gia-ha-noi',
            ],
            [
                'name' => 'Đại học Điện Lực Hà Nội',
                'slug' => 'dai-hoc-dien-luc-ha-noi',
            ]
        ];
        foreach($datas as $data){
            $school = School::create($data);
        }
    }
}
