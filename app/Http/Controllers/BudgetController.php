<?php

namespace App\Http\Controllers;

use App\Models\TblBudget;
use Illuminate\Http\Request;
use App\Models\TblBudgetPlan;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BudgetController extends Controller
{
    public function createBudget(Request $request){
        $inputs = $request->validate([
            'office_id' => ['required'],
            'year_allocated' => ['required'],
            'budget_amount' => ['required'],
            'budget_plan_id' => ['required'],
        ]);

        $budget_plans_details = TblBudgetPlan::find($inputs['budget_plan_id']);

        $getAllocation = $budget_plans_details->budget_amount - $inputs['budget_amount'];

        if ($getAllocation <= 0){
            
            Alert::warning('Warning', 'Insuficient Budget');
            return redirect('/budget-office-budgets-allocation');
        }else{

            $getData = TblBudgetPlan::find($inputs['budget_plan_id']);

            $update_budget_allocated = $getData->budget_allocated + $inputs['budget_amount'];
            $getData->budget_allocated = $update_budget_allocated;
            $getData->save();



            $inputs['budget_status']  = 1;



            TblBudget::create($inputs);
            Alert::success('Success', 'Adding new budget success');
            return redirect('/budget-office-budgets-allocation');


        }

    }   


    public function delete_allocation(Request $request){
        $inputs = $request->validate([
            'id' => ['required'],
            'budget_amount' => ['required'],
            'budget_plan_id' => ['required'],
        ]);

        $budgetPlanData = TblBudgetPlan::find($inputs['budget_plan_id']);
        $editedBudgetallocated = $budgetPlanData->budget_allocated - $request->budget_amount;
        $budgetPlanData->budget_allocated = $editedBudgetallocated;
        $budgetPlanData->save();

        $myBudgetData = TblBudget::find($inputs['id']);
        $myBudgetData->delete();
        Alert::success('Success', 'Adding new budget success');
        return redirect('/budget-office-budgets-allocation');


        
    }
}
