<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('customer')) {
            Schema::create('customer', function (Blueprint $table) {

                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->string('name',100);
                $table->string('email')->unique();
                $table->string('address', 500);
                $table->string('gender',10);
                $table->string('phone_number',30);
                $table->string('password');
                $table->string('salt');
                $table->boolean('delf_flg')->default(false);
                $table->string('user_action_id')->comment('owner action');
                $table->rememberToken();
                $table->timestamps();

//                $table->foreign('user_id')
//                    ->references('id')->on('users')
//                    ->onDelete('cascade');
            });

        }


        if (Schema::hasColumn('customer', 'remember_token')) {
            Schema::table('customer', function (Blueprint $table) {
                $table->dropColumn('remember_token');
            });
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer');
    }
}
