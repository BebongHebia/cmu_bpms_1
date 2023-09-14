<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblItemCategory;
use RealRashid\SweetAlert\Facades\Alert;

class ItemCategoryController extends Controller
{
    public function createItemCategory(Request $request){
        $inputs = $request->validate([
            'item_category_code' => ['required'],
            'item_category_name' => ['required'],
            'item_category_description' => ['required'],
        ]);

        $inputs['item_category_status']  = 1;

        TblItemCategory::create($inputs);
        Alert::success('Success', 'Adding new item category success');
        return redirect('/admin-item-category');
    }

    public function editItemCategory(Request $request){
        $inputs = $request->validate([
            'id' => ['required'],
            'item_category_code' => ['required'],
            'item_category_name' => ['required'],
            'item_category_description' => ['required'],
            'item_category_status' => ['required'],
        ]);

        $getData = TblItemCategory::find($inputs['id']);

        $getData->item_category_code = $request->item_category_code;
        $getData->item_category_name = $request->item_category_name;
        $getData->item_category_description = $request->item_category_description;
        $getData->item_category_status = $request->item_category_status;
        $getData->save();

        Alert::success('Success', 'Edit item category success');
        return redirect('/admin-item-category');
    }

    public function deleteItemCategory(Request $request){
        $inputs = $request->validate([
            'id' => ['required'],
        ]);

        $getData = TblItemCategory::find($inputs['id']);

        $getData->delete();
    
        Alert::warning('Deleted', 'Delete successfull');
        return redirect('/admin-item-category');
    }
}
