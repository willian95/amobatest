<?php

use Illuminate\Database\Seeder;
use App\Models\Calendar;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $calendarData = $this->getData();

        foreach($calendarData as $cd => $data){

            if(Calendar::where("id", $data["id"])->count() == 0){
                $calendar = new Calendar;
                $calendar->id = $data["id"];
                $calendar->calendar_id = $data["calendar_id"];
                $calendar->name = $data["name"];
                $calendar->save();
            }

        }
    }

    function getData(){

        $data = [
            0 => [
                "id"=> 2,
                "calendar_id"=>null,
                "name" => "Catalunya",
                "updated_at" => "2020-01-14 13:42:25",
                "created_at" => "2020-01-14 13:42:25"
            ],
            1 => [
                "id" => 3,
                "calendar_id" => null,
                "name" => "test calendar",
                "updated_at" => "2021-05-03 12:29:46",
                "created_at" => "2021-05-03 12:29:46"
            ],
        ];

        return $data;
    }
}
