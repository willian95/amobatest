<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
            $table->integer("currency_id");
            $table->integer("next_user_plan_id")->nullable();
            $table->datetime("start_timestamp")->nullable();
            $table->datetime("end_timestamp")->nullable();
            $table->datetime("renewal_timestamp")->nullable();
            $table->double("renewal_price", 10, 4);
            $table->boolean("requires_invoice");
            $table->integer("status");
            $table->integer("financiation");
            $table->integer("status_financiation");
            $table->string("language");
            $table->string("nif")->nullable();
            $table->string("business_name")->nullable();
            $table->boolean("pending_payment");
            $table->datetime("date_max_payment")->nullable();
            $table->datetime("proxim_start_timestamp")->nullable();
            $table->datetime("proxim_end_timestamp")->nullable();
            $table->datetime("proxim_renewal_timestamp")->nullable();
            $table->double("proxim_renewal_price", 10, 2)->nullable();
            $table->double("credits_return", 10, 2)->default(0);
            $table->integer("company_id");
            $table->integer("cancel_employee");
            $table->boolean("force_renovation");
            $table->datetime("date_canceled")->nullable();
            $table->double("amount_confirm_canceled", 10, 2)->nullable();
            $table->double("credit_confirm_canceled", 10, 2)->nullable();
            $table->integer("cost_center_id")->default(0);
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
        Schema::dropIfExists('user_plans');
    }
}
