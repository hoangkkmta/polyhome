<?php

use App\Models\Building;
use App\Models\OrderDetail;
use App\Models\RoomCategory;
use App\Models\School;
use App\Models\Utility;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(HostSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(BuildingSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderDetailSeeder::class);
        $this->call(RoomCategorySeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(UtilitySeeder::class);
    }
}
