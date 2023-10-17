<?php

namespace App\Http\Controllers;

use PDF;
use App\Mail\SendMail;
use App\Models\TblPpmp;
use App\Models\TblBudget;
use Illuminate\Http\Request;
use App\Models\TblItemCategory;
use App\Models\TblPurchasedItem;
use App\Models\TblUnlistedCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\BudgetOfficeDeclinePPMP;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class PurchasedItemsController extends Controller
{
    public function college_add_item(Request $request){



        
        
        $inputs = $request->validate([
            'ppmp_code' => ['required'],
            'item_id' => ['required'],
            'item_code' => ['required'],
            'budget_id' => ['required'],
            'ppmp_id' => ['required'],
            'user_id' => ['required'],
            'office_id' => ['required'],
            'item_category_id' => ['required'],
            'item_price' => ['required'],
            'item_name' => ['required'],
            
        ]);

        

        $inputs['quantity_size'] = 0;


        



        

        $inputs['purhcased_item_status'] = 1;
        $inputs['date_procured'] = date("Y/m/d");
        $inputs['is_consolidated'] = 0;
        $inputs['ppmp_part'] = 1;
        $inputs['unlisted_category_id'] = 0;

        if ($request->jan != null){
            $inputs['jan'] = $request->jan;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['jan'];
        }else{
            $inputs['jan'] = 0;
        }

        if ($request->feb != null){
            $inputs['feb'] = $request->feb;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['feb'];
        }else{
            $inputs['feb'] = 0;
        }

        if ($request->mar != null){
            $inputs['mar'] = $request->mar;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['mar'];
        }else{
            $inputs['mar'] = 0;
        }

        if ($request->apr != null){
            $inputs['apr'] = $request->apr;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['apr'];
        }else{
            $inputs['apr'] = 0;
        }

        if ($request->may != null){
            $inputs['may'] = $request->may;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['may'];
        }else{
            $inputs['may'] = 0;
        }

        if ($request->jun != null){
            $inputs['jun'] = $request->jun;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['jun'];
        }else{
            $inputs['jun'] = 0;
        }

        if ($request->jul != null){
            $inputs['jul'] = $request->jul;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['jul'];
        }else{
            $inputs['jul'] = 0;
        }

        if ($request->aug != null){
            $inputs['aug'] = $request->aug;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['aug'];
        }else{
            $inputs['aug'] = 0;
        }

        if ($request->sep != null){
            $inputs['sep'] = $request->sep;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['sep'];
        }else{
            $inputs['sep'] = 0;
        }

        if ($request->oct != null){
            $inputs['oct'] = $request->oct;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['oct'];
        }else{
            $inputs['oct'] = 0;
        }
        
        if ($request->nov != null){
            $inputs['nov'] = $request->nov;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['nov'];
        }else{
            $inputs['nov'] = 0;
        }

        if ($request->dec != null){
            $inputs['dec'] = $request->dec;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['dec'];
        }else{
            $inputs['dec'] = 0;
        }




        $total_cost = $inputs['item_price'] * $inputs['quantity_size'];
        $get_my_budget = TblBudget::find($inputs['budget_id']);
        
        $add_my_budget_spent = $get_my_budget->budget_spent + $total_cost;
        $get_my_budget->budget_spent = $add_my_budget_spent;
        $get_my_budget->save();

        $inputs['total_cost'] = $total_cost;
        

        TblPurchasedItem::create($inputs);

        return Redirect::to(url()->previous());

    }

    public function college_add_item_not_there(Request $request){
        $inputs = $request->validate([
            'ppmp_code' => ['required'],
            'item_id' => ['required'],
            'item_code' => ['required'],
            'budget_id' => ['required'],
            'ppmp_id' => ['required'],
            'user_id' => ['required'],
            'office_id' => ['required'],
            'item_category_id' => ['required'],
            'item_price' => ['required'],
            'item_name' => ['required'],
            
        ]);



        


        


        $inputs['quantity_size'] = 0;
        

        $inputs['purhcased_item_status'] = 1;
        $inputs['date_procured'] = date("Y/m/d");
        $inputs['is_consolidated'] = 0;
        $inputs['ppmp_part'] = 2;
        $inputs['unlisted_category_id'] = $request->unlisted_category_id;

        if ($request->jan != null){
            $inputs['jan'] = $request->jan;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['jan'];
        }else{
            $inputs['jan'] = 0;
        }

        if ($request->feb != null){
            $inputs['feb'] = $request->feb;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['feb'];
        }else{
            $inputs['feb'] = 0;
        }

        if ($request->mar != null){
            $inputs['mar'] = $request->mar;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['mar'];
        }else{
            $inputs['mar'] = 0;
        }

        if ($request->apr != null){
            $inputs['apr'] = $request->apr;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['apr'];
        }else{
            $inputs['apr'] = 0;
        }

        if ($request->may != null){
            $inputs['may'] = $request->may;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['may'];
        }else{
            $inputs['may'] = 0;
        }

        if ($request->jun != null){
            $inputs['jun'] = $request->jun;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['jun'];
        }else{
            $inputs['jun'] = 0;
        }

        if ($request->jul != null){
            $inputs['jul'] = $request->jul;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['jul'];
        }else{
            $inputs['jul'] = 0;
        }

        if ($request->aug != null){
            $inputs['aug'] = $request->aug;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['aug'];
        }else{
            $inputs['aug'] = 0;
        }

        if ($request->sep != null){
            $inputs['sep'] = $request->sep;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['sep'];
        }else{
            $inputs['sep'] = 0;
        }

        if ($request->oct != null){
            $inputs['oct'] = $request->oct;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['oct'];
        }else{
            $inputs['oct'] = 0;
        }
        
        if ($request->nov != null){
            $inputs['nov'] = $request->nov;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['nov'];
        }else{
            $inputs['nov'] = 0;
        }

        if ($request->dec != null){
            $inputs['dec'] = $request->dec;
            $inputs['quantity_size'] = $inputs['quantity_size'] + $inputs['dec'];
        }else{
            $inputs['dec'] = 0;
        }


        $total_cost = $inputs['item_price'] * $inputs['quantity_size'];

        $get_my_budget = TblBudget::find($inputs['budget_id']);
        
        $add_my_budget_spent = $get_my_budget->budget_spent + $total_cost;
        $get_my_budget->budget_spent = $add_my_budget_spent;
        $get_my_budget->save();

        $inputs['total_cost'] = $total_cost;
        $inputs['category_name'] = $request->category_name;

        if ($inputs['unlisted_category_id'] == 0){
            $inputs['unlisted_category_id'] = $request->unlisted_categ_latest_id + 1;

            TblUnlistedCategory::create($inputs);
        }

        

        TblPurchasedItem::create($inputs);
        //return dd($inputs);
        return Redirect::to(url()->previous());
    }

    public function college_remove_item(Request $request){
        $inputs = $request->validate([
            'purchased_item_id' => ['required'],
            'budget_id' => ['required']
        ]);



        $removing_geT_budget = TblBudget::find($inputs['budget_id']);
        $getData = TblPurchasedItem::find($inputs['purchased_item_id']);

        $removing_geT_budget->budget_spent = $removing_geT_budget->budget_spent - $getData->total_cost;
        $removing_geT_budget->save();

        $getData->delete();
        
        
        Alert::warning('Deleted', 'Delete successfull');
        return Redirect::to(url()->previous());
    }

    public function college_remove_item_na(Request $request){
        $inputs = $request->validate([
            'purchased_item_id_na' => ['required'],
            'budget_id' => ['required']
        ]);

        //return dd($inputs);


        

        $removing_geT_budget = TblBudget::find($inputs['budget_id']);
        $getData = TblPurchasedItem::find($inputs['purchased_item_id_na']);

        $removing_geT_budget->budget_spent = $removing_geT_budget->budget_spent - $getData->total_cost;
        $removing_geT_budget->save();

        $getData->delete();
        
        
        Alert::warning('Deleted', 'Delete successfull');
        return Redirect::to(url()->previous());

        
    }

    public function generate_purhcased_item(Request $request){

        
        $get_my_office = TblPpmp::join('tbl_offices', 'tbl_ppmps.office_id', '=', 'tbl_offices.id')
        ->where('tbl_ppmps.id', $request->college_ppmp_id)
        ->select('tbl_ppmps.*', 'tbl_offices.*',) // Add the specific columns you want here
        ->get();

        /*
        $my_purchased_items = TblPurchasedItem::join('tbl_ppmps', 'tbl_purchased_items.ppmp_id', '=', 'tbl_ppmps.id')
        ->where('tbl_ppmps.id', $request->college_ppmp_id)
        ->select('tbl_purchased_items.*', 'tbl_ppmps.*') // Add the specific columns you want here
        ->get();
        */

        $my_purchased_items = TblPurchasedItem::where('user_id', auth()->user()->id)
        ->with('category') // Load the itemCategory relationship
        ->orderBy('item_category_id') // Optional: Order by category ID
        ->get();
        

        $item_category = TblItemCategory::all();
        $item_category_count = $item_category->count();


        $my_ppmp = TblPpmp::find($request->college_ppmp_id);




        return view('pdf.view', ['my_ppmp' => $my_ppmp, 'my_purchased_items' => $my_purchased_items, 'get_my_office' => $get_my_office, 'item_category_count' => $item_category_count]);


        /*
         // Fetch data from the database
        $data = TblPurchasedItem::all(); // Replace with your model and data fetching logic

        // Create an instance of the PDF class with custom options
        $pdf = PDF::loadView('pdf.view', ['data' => $data])->setPaper('legal', 'landscape');

        // Optionally, customize the PDF further
        // $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        // Return the PDF to the user or save it to a file
        return $pdf->stream('document.pdf');
        */
    }

    public function budget_approve_ppmp(Request $request){

        $ppmp_info = TblPpmp::find($request->ppmp_id);

        $ppmp_info->ppmp_status = 0;

        $ppmp_info->save();

        $recipientEmail = $request->user_email;


        Mail::to($recipientEmail)->send(new SendMail());
        Alert::success('Success', 'PPMP Approved Successfully');
        return redirect('/budget-office-ppmp');
        

    }
    public function budget_decline_ppmp(Request $request){

        $mailData = [
            'body' => $request->reasons
        ];

        $ppmp_info = TblPpmp::find($request->ppmp_id);

        $ppmp_info->ppmp_status = 2;

        $ppmp_info->save();

        $recipientEmail = $request->user_email;
        Mail::to($recipientEmail)->send(new BudgetOfficeDeclinePPMP($mailData));
        
        Alert::success('Success', 'PPMP Decline Successfully');
        return redirect('/budget-office-ppmp');
    }


    public function create_anual_procurement_plan(Request $request) {
        // Fetch the PPMP data for the given year
        $ppmpData = TblPpmp::where('for_year', $request->for_year)->where('ppmp_status', 0)->get();
    
        // Generate a unique app_code for each PPMP and save them
        foreach ($ppmpData as $ppmp) {
            $ppmp->app_code = time();
            $ppmp->save();

            // Fetch the purchased items that need to be consolidated
                $purchasedItems = TblPurchasedItem::where('ppmp_id', $ppmp->id)
                ->where('is_consolidated', 0)
                ->get();

            // Mark the purchased items as consolidated and save them
            foreach ($purchasedItems as $item) {
                $item->is_consolidated = 1;
                $item->save();
            }
        }
    
        // Show a success message and redirect
        Alert::success('Success', 'APP Created Successfully');
        return redirect('/bac-office-ppmp-consolidation');
    }

}
