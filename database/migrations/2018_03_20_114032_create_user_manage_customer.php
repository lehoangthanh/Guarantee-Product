<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserManageCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_manage_customer', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('user_action_id')->comment('owner action');
            $table->timestamps();

            // add foreign key user
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');

            // add foreign key customer
            $table->foreign('customer_id')
                ->references('id')->on('customer')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_manage_customer');
    }
}
