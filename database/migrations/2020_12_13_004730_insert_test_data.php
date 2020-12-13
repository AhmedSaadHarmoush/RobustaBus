<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertTestData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert(
            [
            ['id' => 1,'name'=>'Passenger','email'=>'passenger@robusta.com','password'=>Hash::make('123456'),"user_group_id"=>1],
            ['id' => 2,'name'=>'Admin','email'=>'admin@robusta.com','password'=>Hash::make('123456'),"user_group_id"=>2],
            ['id' => 3,'name'=>'Driver','email'=>'driver@robusta.com','password'=>Hash::make('123456'),"user_group_id"=>3],
            ['id' => 4,'name'=>'Moderator','email'=>'moderator@robusta.com','password'=>Hash::make('123456'),"user_group_id"=>4]
            ]
        );
        \Illuminate\Support\Facades\DB::table('buses')->insert(
            ['id'=>1,'plateNumber'=>'ABC123','model'=>'cadillac','color'=>'white']
        );
        \Illuminate\Support\Facades\DB::table('routes')->insert(
            ['id'=>1,'code'=>'ALXCAI1','duration'=>'01:00:00']
        );
        \Illuminate\Support\Facades\DB::table('route_stops')->insert(
            [
            ['id'=>1,'route_id'=>1,'stop_id'=>17,'order'=>1],
            ['id'=>2,'route_id'=>1,'stop_id'=>18,'order'=>2],
            ['id'=>3,'route_id'=>1,'stop_id'=>19,'order'=>3],
            ['id'=>4,'route_id'=>1,'stop_id'=>21,'order'=>4],
            ['id'=>5,'route_id'=>1,'stop_id'=>11,'order'=>5]
            ]
        );
        \Illuminate\Support\Facades\DB::table('trips')->insert(
            ['id'=>1,'route_id'=>1,'bus_id'=>1,'driver_id'=>3,'start_time'=>'2020-12-14 15:00:00']
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
