<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meta_key');
            $table->string('meta_value');
            $table->timestamps();
        });

        // Seeding
        DB::table('settings')->insert([
            ['meta_key' => 'company_name', 'meta_value' => 'Native Theme Inc', 'created_at' => date('Y-m-d H:i:s')],
            ['meta_key' => 'company_address', 'meta_value' => '1 Infinite Loop 95014 Cuperino, CA United States', 'created_at' => date('Y-m-d H:i:s')],
            ['meta_key' => 'company_phone_number', 'meta_value' => '800-692-7753', 'created_at' => date('Y-m-d H:i:s')],
            ['meta_key' => 'company_email', 'meta_value' => 'mail@native-theme.com', 'created_at' => date('Y-m-d H:i:s')]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
