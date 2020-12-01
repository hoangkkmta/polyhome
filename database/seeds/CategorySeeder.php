<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'name' => 'Tin tức',
                'slug' => 'tin-tuc',
                'description' => 'Tin tức',
                'image' => 'category/anh-1.png',
            ],
            [
                'name' => 'Kinh nghiệm thuê nhà',
                'slug' => 'kinh-nghiem-thue-nha',
                'description' => 'Kinh nghiệm thuê nhà',
                'image' => 'category/anh-2.png',
            ],
        ];
        foreach($datas as $data){
            $category =  Category::create($data);
        }
    }
}
