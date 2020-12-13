<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('users',function (Blueprint $table){
            $table->unsignedBigInteger('user_group_id')->default('1');
            $table->index('user_group_id');
            $table->foreign('user_group_id')->references('id')->on('user_groups')->onDelete('cascade');
        });
        \Illuminate\Support\Facades\DB::table('user_groups')->insert([
            ['id' => 1,'name' =>'Passenger'],
            ['id' => 2,'name' =>'Admin'],
            ['id' => 3,'name' =>'Driver'],
            ['id' => 4,'name' =>'Moderator']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function (Blueprint $table) {
            $table->dropForeign('users_user_group_id_foreign');
            $table->dropIndex('users_user_group_id_index');
            $table->dropColumn('user_group_id');
        });
        Schema::dropIfExists('user_groups');
    }
}
