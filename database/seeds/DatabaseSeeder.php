<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoutesSeeder::class);
        $this->call(CalendarSeeder::class);
        $this->call(RouteDataSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserPlanSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}
