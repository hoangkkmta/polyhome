<?php

use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
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
                'order_id' => '1',
                'room_id' => '1',
                'building_id' => '1',
                'customer_id' => '1',
            ],
            [
                'order_id' => '2',
                'room_id' => '1',
                'building_id' => '1',
                'customer_id' => '1',
            ],
        ];
        foreach($datas as $data){
            $orderDetail =  OrderDetail::create($data);
        }
    }
}
