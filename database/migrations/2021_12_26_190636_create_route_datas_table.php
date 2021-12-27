<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_datas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("route_id")->unsigned();
            $table->foreign("route_id")->references("id")->on("routes");

            $table->integer("calendar_id")->unsigned();
            $table->foreign("calendar_id")->references("id")->on("calendars");

            $table->integer("vinculation_route")->nullable();
            $table->boolean("route_circular");
            $table->datetime("date_init");
            $table->datetime("date_finish");
            $table->boolean("mon");
            $table->boolean("tue");
            $table->boolean("wed");
            $table->boolean("thu");
            $table->boolean("fri");
            $table->boolean("sat");
            $table->boolean("sun");

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
        Schema::dropIfExists('route_datas');
    }
}
