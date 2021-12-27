<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post("reservation-by-user", "ReservationController@getReservationsByUser");

/*
    payload
    {
        "user_id":"35"
    }

*/

Route::post("route/unavailable-days", "RouteController@getUnavailableDays");
/*
    payload
    {
        "route_id":[54, 56],
        "start_date": "2021-03-04",
        "end_date": "2021-07-04"
    }

    Or

    {
        "route_id":54,
        "start_date": "2021-03-04",
        "end_date": "2021-07-04"
    }

*/


Route::post("route/reservations", "RouteController@getRouteReservation");
/*

    payload
    {
        "route_id":[54, 56],
        "date":"2021-12-10"
    }

    OR

    {
        "route_id":54,
        "date":"2021-12-10"
    }

*/