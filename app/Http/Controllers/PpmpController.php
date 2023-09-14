<?php

namespace App\Http\Controllers;

use App\Models\TblPpmp;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PpmpController extends Controller
{
    public function create_ppmp(Request $request){
        $inputs = $request->validate([
            'budget_id' => ['required'],
            'user_id' => ['required'],
            'office_id' => ['required'],
        ]);

        $timestamp = now()->timestamp; // Get the current timestamp
        $code = $timestamp;

        $inputs['ppmp_code'] = $code; //Help me creatre;
        $inputs['ppmp_status'] = 1;

        TblPpmp::create($inputs);
        Alert::success('Success', 'Adding PPMP success');
        return redirect('/college-ppmp');


    }
}
