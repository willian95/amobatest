<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\CarbonPeriod;
use App\Http\Requests\ReservationByUserRequest;

class ReservationController extends Controller
{
    
    function getReservationsByUser(ReservationByUserRequest $request){

     
        $reservationsArray = [];
        $reservations = Reservation::whereHas("userPlan", function($q) use($request){

            $q->where("user_id", $request->user_id);

        })->with("route", "route.routeDatas", "userPlan.user")->get();

        foreach($reservations as $reservation){

            $period = CarbonPeriod::create($reservation->reservation_start, $reservation->reservation_end);
            $availableDates = $this->checkDateAvailability($period, $reservation->route);

            $reservationsArray[] = [
                "availableDates" => $availableDates,
                "reservation" => $reservation,
            ];

        }

        return response()->json($reservationsArray);



    }

    function checkDateAvailability($period, $route){

        $availableDates = [];
        $weekMap = [
            0 => 'sun',
            1 => 'mon',
            2 => 'tue',
            3 => 'wed',
            4 => 'thu',
            5 => 'fri',
            6 => 'sat',
        ];

        $dayAvailability = $route->routeDatas->toArray();

        foreach($period as $date){

            $availableDates[] = [
                "date" => $date->format("Y-m-d h:m:s"),
                "dayOfWeek" => $weekMap[$date->dayOfWeek],
                "isAvailable" => $dayAvailability[$weekMap[$date->dayOfWeek]]
            ];

        }
        
        return $availableDates;

    }

}
