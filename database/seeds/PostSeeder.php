<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
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
        ];
        foreach($datas as $data){
            $building =  Post::create($data);
        }
    }
}
