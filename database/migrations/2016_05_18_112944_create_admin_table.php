<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{ /**
 * Run the migrations.
 *
 * @return void
 */
    public function up()
    {
        Schema::create('admin_role', function(Blueprint $t){
            $t->increments('id');
            $t->string('name')->unique();
            $t->string('description')->nullable();
            $t->integer('value');
            $t->timestamps();
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('role_id')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_role');
        Schema::drop('admin');
    }
}
