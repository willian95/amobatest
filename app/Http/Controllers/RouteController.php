<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RouteData;
use App\Models\Reservation;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
use App\Http\Requests\UnavailableDaysRequest;
use App\Http\Requests\RouteReservationRequest;

class RouteController extends Controller
{
    
    function getUnavailableDays(UnavailableDaysRequest $request){

        $unavailableDatesByRoute=[];

        $routesId = $request->route_id;
        if(!is_array($request->route_id))
            $routesId = [
                $request->route_id
            ];

        foreach($routesId as $routeId){
            $unavailableDates = $this->checkForUnavailableDates($routeId, $request->start_date, $request->end_date);

            $unavailableDatesByRoute[] = [
                "route" => $unavailableDates["route"],
                "unavailableDates" => $unavailableDates["unavailableDates"],
            ];
        }

        return response()->json($unavailableDatesByRoute);

    }

    function checkForUnavailableDates($route_id, $start_date, $end_date){

        $unavailableDates = [];
        $weekMap = [
            0 => 'sun',
            1 => 'mon',
            2 => 'tue',
            3 => 'wed',
            4 => 'thu',
            5 => 'fri',
            6 => 'sat',
        ];

        $routeData = RouteData::where("route_id", $route_id)->with("route")->first();

        if(!$routeData){
            return ["unavailableDates" => $unavailableDates, "route" => ["id"=> $route_id, "msg" => "no encontrada"]];
        }

        $dayAvailability = $routeData->toArray();
        $period = CarbonPeriod::create($start_date, $end_date);

        foreach($period as $date){

            if($dayAvailability[$weekMap[$date->dayOfWeek]] == 0){
                $unavailableDates[] = [ 
                    "date" => $date->format("Y-m-d h:m:s"),
                    "dayOfWeek" => $weekMap[$date->dayOfWeek]
                ];
            }
            

        }

        return ["unavailableDates" => $unavailableDates, "route" => $routeData->route];

    }

    function getRouteReservation(RouteReservationRequest $request){

        $reservationsRoute=[];

        $routesId = $request->route_id;
        if(!is_array($request->route_id))
            $routesId = [
                $request->route_id
            ];

        foreach($routesId as $routeId){
            
            $reservations = $this->checkForRouteMaxReservations($routeId, $request->date);

            if(!$reservations["routeData"]){
                
                $reservationsRoute[] = [
                    "msg" => $reservations["msg"]
                ];

            }else{

                $reservationsRoute[] = [
                    "maxReservations" => $reservations["routeData"]["max_reservations_per_day"],
                    "reservationsAmount" => count($reservations["reservations"]),
                    "isMaxCapacity" => count($reservations["reservations"]) >= $reservations["routeData"]["max_reservations_per_day"] ? true : false,
                    "msg" => $reservations["msg"],
                    "routeData" => $reservations["routeData"],
                    "reservations" => $reservations["reservations"],
                
                ];

            }

            
        }

        return response()->json($reservationsRoute);

    }

    function checkForRouteMaxReservations($route_id, $date){

        $amountOfReservations = 0;
        $weekMap = [
            0 => 'sun',
            1 => 'mon',
            2 => 'tue',
            3 => 'wed',
            4 => 'thu',
            5 => 'fri',
            6 => 'sat',
        ];

        $carbonDate = Carbon::createFromFormat('Y-m-d', $date);
        $routeData = RouteData::where("route_id", $route_id)->with("route")->first();

        if(!$routeData){
            return ["routeData" => $routeData, "reservations" => [], "msg" => "Ruta no encontrada"];
        }

        $availableDaysArray = $routeData->toArray();

        if($availableDaysArray[$weekMap[$carbonDate->dayOfWeek]] == 0){
            return ["routeData" => $routeData, "reservations" => [], "msg" => "Dia no habil"];
        }

        $reservations = Reservation::where("route_id", $route_id)->where('reservation_start', '<=', $date)
        ->where('reservation_end', '>=', $date)->get();

        return ["routeData" => $routeData, "reservations" => $reservations, "msg" => ""];

    }

}
