<?php

namespace App\Http\Controllers;

use App\Models\TblBudget;
use Illuminate\Http\Request;
use App\Models\TblBudgetPlan;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BudgetPlanController extends Controller
{
    
    public function createBudgetPlan(Request $request){
        $inputs = $request->validate([
            'year_plan' => ['required'],
            'budget_amount' => ['required'],
        ]);

        $inputs['plan_status']  = 1;
        $inputs['budget_allocated']  = 0.0;

        TblBudgetPlan::create($inputs);
        Alert::success('Success', 'Adding new budget success');
        return redirect('/budget-office-budgets-planning');
    }

    Public function close_budget_plan(Request $request){
        $inputs = $request->validate([
            'id' => ['required'],
        ]);

        $getBudgetPlanData = TblBudgetPlan::find($inputs['id']);
        $getBudgetPlanData->plan_status = 0;
        $getBudgetPlanData->save();
        Alert::success('Success', 'Plan Close success');
        return redirect('/budget-office-budgets-planning');
    }

    public function reOpen_budget_plan(Request $request){
        $inputs = $request->validate([
            'id' => ['required'],
        ]);

        $getBudgetPlanData = TblBudgetPlan::find($inputs['id']);
        $getBudgetPlanData->plan_status = 1;
        $getBudgetPlanData->save();
        Alert::success('Success', 'Plan Open success');
        return redirect('/budget-office-budgets-planning');
    }

    public function delete_budget_plan(Request $request){
        $inputs = $request->validate([
            'id' => ['required'],
        ]);

        $getAllocations = TblBudget::where('budget_plan_id', $inputs['id']);
        $getAllocations->delete();
        

        $getBudgetPlanData = TblBudgetPlan::find($inputs['id']);
        $getBudgetPlanData->delete();
        Alert::success('Success', 'Deleted success');
        return redirect('/budget-office-budgets-planning');

    }
}
