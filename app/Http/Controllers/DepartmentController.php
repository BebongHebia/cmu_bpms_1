<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblDepartment;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    public function create_department(Request $request){
        $inputs = $request->validate([
            'office_id' => ['required'],
            'dept_name' => ['required'],
            'dept_description' => ['required'],
        ]);

        $inputs['dept_status'] = 1;

        TblDepartment::create($inputs);
        Alert::success('Success', 'Adding new department success');
        return redirect('/college-departments');
    }
}
