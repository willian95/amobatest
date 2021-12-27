<?php

use Illuminate\Database\Seeder;
use App\Models\UserPlan;

class UserPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $userPlanData = $this->getData();

        foreach($userPlanData as $upd => $data){

            if(UserPlan::where("id", $data["id"])->count() == 0){
                $userPlan = new UserPlan;
                $userPlan->id = $data["id"];
                $userPlan->user_id = $data["user_id"];
                $userPlan->currency_id = $data["currency_id"];
                $userPlan->next_user_plan_id = $data["next_user_plan_id"];
                $userPlan->start_timestamp = $data["start_timestamp"];
                $userPlan->end_timestamp = $data["end_timestamp"];
                $userPlan->renewal_timestamp = $data["renewal_timestamp"];
                $userPlan->renewal_price = $data["renewal_price"];
                $userPlan->requires_invoice = $data["requires_invoice"];
                $userPlan->end_timestamp = $data["end_timestamp"];
                $userPlan->end_timestamp = $data["end_timestamp"];
                $userPlan->status = $data["status"];
                $userPlan->financiation = $data["financiation"];
                $userPlan->status_financiation = $data["status_financiation"];
                $userPlan->language = $data["language"];
                $userPlan->nif = $data["nif"];
                $userPlan->pending_payment = $data["pending_payment"];
                $userPlan->date_max_payment = $data["date_max_payment"];
                $userPlan->proxim_start_timestamp = $data["proxim_start_timestamp"];
                $userPlan->proxim_end_timestamp = $data["proxim_end_timestamp"];
                $userPlan->proxim_renewal_timestamp = $data["proxim_renewal_timestamp"];
                $userPlan->proxim_renewal_price = $data["proxim_renewal_price"];
                $userPlan->credits_return = $data["credits_return"];
                $userPlan->company_id = $data["company_id"];
                $userPlan->cancel_employee = $data["cancel_employee"];
                $userPlan->force_renovation = $data["force_renovation"];
                $userPlan->date_canceled = $data["date_canceled"];
                $userPlan->amount_confirm_canceled = $data["amount_confirm_canceled"];
                $userPlan->credit_confirm_canceled = $data["credit_confirm_canceled"];
                $userPlan->cost_center_id = $data["cost_center_id"];
                $userPlan->save();
            }

        }

    }

    function getData(){

        $data = [
            0 => [
              'id' => 52,
              'user_id' => 35,
              'currency_id' => 2,
              'next_user_plan_id' => NULL,
              'start_timestamp' => NULL,
              'end_timestamp' => NULL,
              'renewal_timestamp' => NULL,
              'renewal_price' => 30.0,
              'requires_invoice' => 0,
              'status' => 10,
              'created' => '2021-12-18 06:14:37',
              'modified' => '2021-12-18 06:14:37',
              'financiation' => 0,
              'status_financiation' => 0,
              'language' => 'ca_ES',
              'nif' => '',
              'business_name' => '',
              'pending_payment' => 0,
              'date_max_payment' => NULL,
              'proxim_start_timestamp' => NULL,
              'proxim_end_timestamp' => NULL,
              'proxim_renewal_timestamp' => NULL,
              'proxim_renewal_price' => NULL,
              'credits_return' => 0.0,
              'company_id' => 33,
              'cancel_employee' => 0,
              'force_renovation' => 0,
              'date_canceled' => NULL,
              'amount_confirm_canceled' => NULL,
              'credit_confirm_canceled' => NULL,
              'cost_center_id' => 0,
            ],
        ];
    
        return $data;
    }
}
