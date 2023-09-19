<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblPurchasedItem;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;

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
            'quantity_size' => ['required'],
        ]);

        $inputs['purhcased_item_status'] = 1;
        $inputs['date_procured'] = date("Y/m/d");
        $inputs['is_consolidated'] = 0;
        $inputs['ppmp_part'] = 1;

        TblPurchasedItem::create($inputs);

        return Redirect::to(url()->previous());

    }

    public function college_remove_item(Request $request){

        $my_purchased_items = TblPurchasedItem::find($request->purchased_item_id);

        $my_purchased_items->delete();
        return Redirect::to(url()->previous());

    }
}
