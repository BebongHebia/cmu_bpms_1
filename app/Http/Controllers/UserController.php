<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function addAdmin(Request $request){
        $inputs = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'date_of_birth' => ['required'],
            'sex' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'confirm_password' => ['required'],
        ]);

        if($inputs['password'] === $inputs['confirm_password']){
            $inputs['password'] = bcrypt($inputs['password']);
            $inputs['account_status'] = 1;
            $inputs['role_id'] = 1;
            $inputs['office_id'] = 1;

            User::create($inputs);
            Alert::success('Success', 'Adding new admin success');
            return redirect('/adding-admin');

        }else{
            Alert::warning('Fail', 'Please check if password is matched?');
            return redirect('/adding-admin');
        }
    }

    public function admin_add_personel(Request $request){
        $inputs = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'date_of_birth' => ['required'],
            'sex' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'role_id' => ['required'],
            'office_id' => ['required'],
            'password' => ['required'],
            'confirm_password' => ['required'],
        ]);

        if ($inputs['password'] === $inputs['confirm_password']){

            $inputs['password'] = bcrypt($inputs['password']);

            $inputs['account_status'] = 1;
            
            User::create($inputs);
            Alert::success('Success', 'Adding new admin success');
            return redirect('/admin-personel');
        }
    }

    public function login(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $userDetails = auth()->user()->role_id;
            session(['user_id' => $user->id]);

            $request->session()->regenerate();
            

            if ($userDetails == 1){
                return redirect()->intended('/admin-dashboard');
            }elseif($userDetails == 2){
                return redirect()->intended('/budget-office-dashboard');
            }elseif($userDetails == 3){
                return redirect()->intended('/bac-office-dashboard');
            }elseif($userDetails == 4){
                return redirect()->intended('/college_dashboard');
            }
            

            
        }

        return redirect()->route('login')
        ->withInput($request->only('email'))
        ->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function edit_personel(Request $request){
        $inputs = $request->validate([
            'id' => ['required'],
            'role_id' => ['required'],
            'office_id' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'date_of_birth' => ['required'],
            'sex' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
        ]);

        $getData = User::find($inputs['id']);

        $getData->id = $request->id;
        $getData->role_id = $request->role_id;
        $getData->office_id = $request->office_id;
        $getData->first_name = $request->first_name;
        $getData->last_name = $request->last_name;
        $getData->middle_name = $request->middle_name;
        $getData->date_of_birth = $request->date_of_birth;
        $getData->sex = $request->sex;
        $getData->phone = $request->phone;
        $getData->email = $request->email;

        $getData->save();
    
        Alert::success('Success', 'Personel Edited Successfully');
        return redirect('/admin-personel');
    }

    public function deletePersonel(Request $request){
        $inputs = $request->validate([
            'id' => ['required'],
        ]);

        $getData = User::find($inputs['id']);

        $getData->delete();
    
        Alert::warning('Deleted', 'Delete successfull');
        return redirect('/admin-personel');
    }
}
