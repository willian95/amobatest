<?php

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $reservationData = $this->getData();

        foreach($reservationData as $rd => $data){

            if(Reservation::where("id", $data["id"])->count() == 0){
                $reservation = new Reservation;
                $reservation->id = $data["id"];
                $reservation->user_plan_id = $data["user_plan_id"];
                $reservation->route_id = $data["route_id"];
                $reservation->track_id = $data["track_id"];
                $reservation->reservation_start = $data["reservation_start"];
                $reservation->reservation_end = $data["reservation_end"];
                $reservation->route_stop_origin_id = $data["route_stop_origin_id"];
                $reservation->route_stop_destination_id = $data["route_stop_destination_id"];
                $reservation->save();
            }

        }

    }

    function getData(){

        $data = [
            0 => [
              'id' => 213,
              'user_plan_id' => 52,
              'route_id' => 56,
              'track_id' => NULL,
              'reservation_start' => '2021-12-17 00:00:00',
              'reservation_end' => '2021-12-17 00:00:00',
              'route_stop_origin_id' => 597,
              'route_stop_destination_id' => 600,
              'created_at' => '2021-12-17 19:38:38',
              'updated_at' => '2021-12-17 19:38:38',
              'deleted_at' => NULL,
            ],
            1 => [
              'id' => 214,
              'user_plan_id' => 52,
              'route_id' => 56,
              'track_id' => NULL,
              'reservation_start' => '2021-12-24 00:00:00',
              'reservation_end' => '2021-12-24 00:00:00',
              'route_stop_origin_id' => 597,
              'route_stop_destination_id' => 600,
              'created_at' => '2021-12-17 19:38:38',
              'updated_at' => '2021-12-17 19:38:38',
              'deleted_at' => NULL,
            ],
            2 => [
              'id' => 215,
              'user_plan_id' => 52,
              'route_id' => 56,
              'track_id' => NULL,
              'reservation_start' => '2021-12-31 00:00:00',
              'reservation_end' => '2021-12-31 00:00:00',
              'route_stop_origin_id' => 597,
              'route_stop_destination_id' => 600,
              'created_at' => '2021-12-17 19:38:38',
              'updated_at' => '2021-12-17 19:38:38',
              'deleted_at' => NULL,
            ],
        ];

        return $data;

    }

}
