<?php

namespace App\Http\Controllers;

use App\Models\TblItem;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ItemsController extends Controller
{
    public function createItem(Request $request){
        $inputs = $request->validate([
            'item_name' => ['required'],
            'item_code' => ['required'],
            'item_description' => ['required'],
            'item_category_id' => ['required'],
            'item_unit_measure' => ['required'],
            'item_price' => ['required'],
            'item_from' => ['required'],
        ]);

        $inputs['item_status'] = 1;
        $inputs['availability'] = 1;

        TblItem::create($inputs);
        Alert::success('Success', 'Adding new item success');
        return redirect('/admin-item');
    }

    public function editItems(Request $request){
        $inputs = $request->validate([
            'item_name' => ['required'],
            'id' => ['required'],
            'item_code' => ['required'],
            'item_description' => ['required'],
            'item_category_id' => ['required'],
            'item_unit_measure' => ['required'],
            'item_price' => ['required'],
            'availability' => ['required'],
        ]);

        $getData = TblItem::find($inputs['id']);

        $getData->item_name = $request->item_name;
        $getData->id = $request->id;
        $getData->item_code = $request->item_code;
        $getData->item_description = $request->item_description;
        $getData->item_category_id = $request->item_category_id;
        $getData->availability = $request->availability;
        $getData->item_unit_measure = $request->item_unit_measure;
        $getData->item_price = $request->item_price;

        $getData->save();

        Alert::success('Success', 'Item Edited Successfully');
        return redirect('/admin-item');
    }

    public function deleteItems(Request $request){
        $inputs = $request->validate([
            'id' => ['required'],
        ]);

        $getData = TblItem::find($inputs['id']);

        $getData->delete();
    
        Alert::warning('Deleted', 'Delete successfull');
        return redirect('/admin-item');
    }

    public function getItemDetails($itemId)
    {
        // Retrieve item details from the database based on $itemId
        $item = TblItem::find($itemId); // Replace 'TblItem' with your actual model

        if ($item) {
            // Return item details as JSON
            return response()->json($item);
        } else {
            // Handle the case where the item is not found
            return response()->json(['error' => 'Item not found'], 404);
        }
    }
}
