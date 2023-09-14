<?php

namespace App\Http\Controllers;

use App\Models\TblOffice;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OfficeController extends Controller
{
    public function addOffices(Request $request){
        $inputs = $request->validate([
            'office_type' => ['required'],
            'office_name' => ['required'],
            'office_desc' => ['required'],
        ]);

        $inputs['office_status']  = 1;

        TblOffice::create($inputs);
        Alert::success('Success', 'Adding new officess success');
        return redirect('/admin-offices');
        
    }

    public function editOffice(Request $request){
        $inputs = $request->validate([
            'id' => ['required'],
            'office_name' => ['required'],
            'office_desc' => ['required'],
            'office_status' => ['required'],
        ]);

        $getData = TblOffice::find($inputs['id']);

        $getData->id = $request->id;
        $getData->office_type = $request->office_type;
        $getData->office_name = $request->office_name;
        $getData->office_desc = $request->office_desc;
        $getData->office_status = $request->office_status;

        $getData->save();
    
        Alert::success('Success', 'Success Message');
        return redirect('/admin-offices');

    }

    public function deleteOffice(Request $request){

        $inputs = $request->validate([
            'id' => ['required'],
        ]);

        $getData = TblOffice::find($inputs['id']);

        $getData->delete();
    
        Alert::warning('Deleted', 'Delete successfull');
        return redirect('/admin-offices');
        
    }
}
