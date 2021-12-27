<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string("external_id");
            $table->string("external_budget_id");
            $table->string("external_route_id");
            $table->integer("track_id")->nullable();
            $table->string("name")->nullable();
            $table->text("notes")->nullable();
            $table->datetime("timestamp");
            $table->string("arrival_address");
            $table->datetime("arrival_timestamp");
            $table->string("departure_address");
            $table->datetime("departure_timestamp");
            $table->integer("pax");
            $table->integer("confirmed_pax_count");
            $table->datetime("reported_departure_timestamp")->nullable();
            $table->double("reported_departure_kms", 10, 2)->nullable();
            $table->datetime("reported_arrival_timestamp")->nullable();
            $table->double("reported_arrival_kms", 10, 2)->nullable();
            $table->string("reported_vehicle_plate_number")->nullable();
            $table->integer("status");
            $table->text("status_info");
            $table->integer("reprocess_status");
            $table->integer("return");
            $table->string("synchronized_downstream")->nullable();
            $table->string("synchronized_upstream")->nullable();
            $table->integer("province_id")->nullable();
            $table->integer("sale_tickets_drivers")->nullable();
            $table->text("notes_drivers")->nullable();
            $table->text("itinerary_drivers");
            $table->double("cost_if_externalized")->nullable();
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
        Schema::dropIfExists('services');
    }
}
