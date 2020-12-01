<?php

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
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
                'customer_name' => 'Nguyễn Văn A',
                'customer_phone_number' => '0123456789',
                'customer_email' => 'nguyenvana@gmail.com',
                'total_price' => '3000000',
                'date_view_room' => '2020-11-19 00:00:00',
                'note' => ''
            ],
            [
                'host_id' => '1',
                'customer_name' => 'Nguyễn Văn b',
                'customer_phone_number' => '0123456789',
                'customer_email' => 'nguyenvanb@gmail.com',
                'total_price' => '3500000',
                'date_view_room' => '2020-11-19 00:00:00',
                'note' => ''
            ],
        ];
        foreach($datas as $data){
            $order = Order::create($data);
        }
    }
}
