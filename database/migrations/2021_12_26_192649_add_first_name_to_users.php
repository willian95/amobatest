<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFirstNameToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("first_name");
            $table->string("last_name")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("picture")->nullable();
            $table->datetime("last_online")->nullable();
            $table->string("verification_code")->nullable();
            $table->string("new_email")->nullable();    
            $table->integer("status");
            $table->boolean("first");
            $table->datetime("last_accept_date")->nullable();
            $table->string("company_contact")->nullable();
            $table->double("credits", 10, 2)->nullable();
            $table->boolean("first_trip");
            $table->boolean("incomplete_profile");
            $table->boolean("phone_verify");
            $table->string("token_auto_login")->nullable();
            $table->integer("user_vertical")->nullable();
            $table->integer("language_id")->nullable();
            $table->boolean("no_registered");
            $table->softdeletes();

        });
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
