<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('menu_id');
        });

        // Seeding
        for ($i = 1; $i <= 44; $i++) {
            DB::table('privileges')->insert([
                ['group_id' => 1, 'menu_id' => $i]
            ]);
        }

        DB::table('privileges')->insert([
            ['group_id' => 2, 'menu_id' => 1]
        ]);

        for ($i = 6; $i <= 44; $i++) {
            DB::table('privileges')->insert([
                ['group_id' => 2, 'menu_id' => $i]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privileges');
    }
}
