<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('token');
            $table->rememberToken();
            $table->timestamps();
        });

        // Seeding
        DB::table('users')->insert([
          [
            'group_id' => 1,
            'name' => 'John Doe',
            'email' => 'johndoe@native-theme.com',
            'password' => '$2y$10$Z.KSsWLko7whEtCfVhdKReZo08KGhtD0osQFxesJ9iMZgJE6F.jzm',
            'token' => str_random(10),
            'remember_token' => str_random(10),
            'created_at' => date('Y-m-d H:i:s')
          ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}
