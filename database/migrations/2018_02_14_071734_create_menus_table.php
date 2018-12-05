<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->integer('child_count');
            $table->string('title');
            $table->string('menu_section');
            $table->string('route_name');
            $table->string('params');
            $table->string('query');
            $table->string('icon');
            $table->timestamps();
        });

        // Seeding
        DB::table('menus')->insert([
            ['id' => 1, 'parent_id' => 0, 'child_count' => 0, 'title' => 'Dashboard', 'menu_section' => 'Menu', 'route_name' => 'home-template', 'params' => '', 'query' => '', 'icon' => 'pe-7s-keypad', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 2, 'parent_id' => 0, 'child_count' => 3, 'title' => 'Settings', 'menu_section' => 'Menu', 'route_name' => '', 'params' => '', 'query' => '', 'icon' => 'pe-7s-config', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 3, 'parent_id' => 2, 'child_count' => 0, 'title' => 'Users', 'menu_section' => 'Menu', 'route_name' => 'users', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 4, 'parent_id' => 2, 'child_count' => 0, 'title' => 'Groups', 'menu_section' => 'Menu', 'route_name' => 'groups', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 5, 'parent_id' => 2, 'child_count' => 0, 'title' => 'Privileges', 'menu_section' => 'Menu', 'route_name' => 'privileges', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],

            ['id' => 6, 'parent_id' => 0, 'child_count' => 0, 'title' => 'Products', 'menu_section' => 'Menu', 'route_name' => 'products', 'params' => '', 'query' => '', 'icon' => 'pe-7s-drawer', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 7, 'parent_id' => 0, 'child_count' => 0, 'title' => 'Transactions', 'menu_section' => 'Menu', 'route_name' => 'transactions', 'params' => '', 'query' => '', 'icon' => 'pe-7s-credit', 'created_at' => date('Y-m-d H:i:s')],

            ['id' => 8, 'parent_id' => 0, 'child_count' => 2, 'title' => 'Menu Styles', 'menu_section' => 'Templates', 'route_name' => '', 'params' => '', 'query' => '', 'icon' => 'pe-7s-link', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 9, 'parent_id' => 8, 'child_count' => 0, 'title' => 'Fixed Menu', 'menu_section' => 'Templates', 'route_name' => 'fixed-nav-template', 'params' => '{"navStyle":"fixed-menu"}', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 10, 'parent_id' => 8, 'child_count' => 0, 'title' => 'Compact Menu', 'menu_section' => 'Templates', 'route_name' => 'compact-nav-template', 'params' => '{"navStyle":"compact-menu"}', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],

            ['id' => 11, 'parent_id' => 0, 'child_count' => 6, 'title' => 'Forms', 'menu_section' => 'Templates', 'route_name' => '', 'params' => '', 'query' => '', 'icon' => 'pe-7s-note', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 12, 'parent_id' => 11, 'child_count' => 0, 'title' => 'Form Elements', 'menu_section' => 'Templates', 'route_name' => 'form-elements-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 13, 'parent_id' => 11, 'child_count' => 0, 'title' => 'Form Validation', 'menu_section' => 'Templates', 'route_name' => 'form-validation-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 14, 'parent_id' => 11, 'child_count' => 0, 'title' => 'Form Buttons', 'menu_section' => 'Templates', 'route_name' => 'form-buttons-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 15, 'parent_id' => 11, 'child_count' => 0, 'title' => 'Form Wizards', 'menu_section' => 'Templates', 'route_name' => 'form-wizard-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 16, 'parent_id' => 11, 'child_count' => 0, 'title' => 'File Upload', 'menu_section' => 'Templates', 'route_name' => 'file-upload-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 17, 'parent_id' => 11, 'child_count' => 0, 'title' => 'Wysiwyg Editor', 'menu_section' => 'Templates', 'route_name' => 'wysiwyg-editor-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],

            ['id' => 18, 'parent_id' => 0, 'child_count' => 2, 'title' => 'Tables', 'menu_section' => 'Templates', 'route_name' => '', 'params' => '', 'query' => '', 'icon' => 'pe-7s-browser', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 19, 'parent_id' => 18, 'child_count' => 0, 'title' => 'Basic Table', 'menu_section' => 'Templates', 'route_name' => 'basic-table-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 20, 'parent_id' => 18, 'child_count' => 0, 'title' => 'Datatable', 'menu_section' => 'Templates', 'route_name' => 'datatable-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],

            ['id' => 21, 'parent_id' => 0, 'child_count' => 0, 'title' => 'Charts', 'menu_section' => 'Templates', 'route_name' => 'charts-template', 'params' => '', 'query' => '', 'icon' => 'pe-7s-graph1', 'created_at' => date('Y-m-d H:i:s')],

            ['id' => 22, 'parent_id' => 0, 'child_count' => 10, 'title' => 'Pages', 'menu_section' => 'Pages', 'route_name' => '', 'params' => '', 'query' => '', 'icon' => 'pe-7s-photo-gallery', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 23, 'parent_id' => 22, 'child_count' => 0, 'title' => 'Invoice', 'menu_section' => 'Pages', 'route_name' => 'invoice-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 24, 'parent_id' => 22, 'child_count' => 0, 'title' => 'Login', 'menu_section' => 'Pages', 'route_name' => 'login-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 25, 'parent_id' => 22, 'child_count' => 0, 'title' => 'Register', 'menu_section' => 'Pages', 'route_name' => 'register-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 26, 'parent_id' => 22, 'child_count' => 0, 'title' => 'Lock Screen', 'menu_section' => 'Pages', 'route_name' => 'lock-screen-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 27, 'parent_id' => 22, 'child_count' => 0, 'title' => 'Media', 'menu_section' => 'Pages', 'route_name' => 'media-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 28, 'parent_id' => 22, 'child_count' => 0, 'title' => 'Chat', 'menu_section' => 'Pages', 'route_name' => 'chat-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 29, 'parent_id' => 22, 'child_count' => 0, 'title' => 'Error 404', 'menu_section' => 'Pages', 'route_name' => 'error-404-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 30, 'parent_id' => 22, 'child_count' => 0, 'title' => 'Error 500', 'menu_section' => 'Pages', 'route_name' => 'error-500-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 31, 'parent_id' => 22, 'child_count' => 0, 'title' => 'Blank Layout', 'menu_section' => 'Pages', 'route_name' => 'blank-layout-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],

            ['id' => 32, 'parent_id' => 0, 'child_count' => 0, 'title' => 'Calendar', 'menu_section' => 'Pages', 'route_name' => 'calendar-template', 'params' => '', 'query' => '', 'icon' => 'pe-7s-date', 'created_at' => date('Y-m-d H:i:s')],

            ['id' => 33, 'parent_id' => 0, 'child_count' => 11, 'title' => 'Icons', 'menu_section' => 'Pages', 'route_name' => '', 'params' => '', 'query' => '', 'icon' => 'pe-7s-rocket', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 34, 'parent_id' => 33, 'child_count' => 0, 'title' => 'Font Awesome', 'menu_section' => 'Pages', 'route_name' => 'font-awesome-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 35, 'parent_id' => 33, 'child_count' => 0, 'title' => 'Batch', 'menu_section' => 'Pages', 'route_name' => 'batch-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 36, 'parent_id' => 33, 'child_count' => 0, 'title' => 'Dashicon', 'menu_section' => 'Pages', 'route_name' => 'dashicon-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 37, 'parent_id' => 33, 'child_count' => 0, 'title' => 'Dripicon', 'menu_section' => 'Pages', 'route_name' => 'dripicon-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 38, 'parent_id' => 33, 'child_count' => 0, 'title' => 'Eightyshades', 'menu_section' => 'Pages', 'route_name' => 'eightyshades-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 39, 'parent_id' => 33, 'child_count' => 0, 'title' => 'Foundation', 'menu_section' => 'Pages', 'route_name' => 'foundation-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 40, 'parent_id' => 33, 'child_count' => 0, 'title' => 'Metrize', 'menu_section' => 'Pages', 'route_name' => 'metrize-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 41, 'parent_id' => 33, 'child_count' => 0, 'title' => 'Simple Line', 'menu_section' => 'Pages', 'route_name' => 'simple-line-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 42, 'parent_id' => 33, 'child_count' => 0, 'title' => 'Themify', 'menu_section' => 'Pages', 'route_name' => 'themify-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 43, 'parent_id' => 33, 'child_count' => 0, 'title' => 'Typeicon', 'menu_section' => 'Pages', 'route_name' => 'typeicon-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 44, 'parent_id' => 33, 'child_count' => 0, 'title' => 'Weather Icon', 'menu_section' => 'Pages', 'route_name' => 'weathericon-template', 'params' => '', 'query' => '', 'icon' => '', 'created_at' => date('Y-m-d H:i:s')]
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
        Schema::dropIfExists('menus');
        Schema::enableForeignKeyConstraints();
    }
}
