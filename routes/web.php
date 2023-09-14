<?php

use App\Models\User;
use App\Models\TblItem;
use App\Models\TblBudget;
use App\Models\TblOffice;
use App\Models\TblBudgetPlan;
use App\Models\TblDepartment;
use App\Models\TblItemCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpmpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\BudgetPlanController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ItemCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    if (session()->has('user_id')) {

        $users = User::find(session('user_id'));
        $userDetails = $users->role_id;


            if ($userDetails == 1){
                return redirect()->intended('/admin-dashboard');
            }elseif($userDetails == 2){
                return redirect()->intended('/budget-office-dashboard');
            }elseif($userDetails == 3){
                return redirect()->intended('/bac_office_sidebar');
            }elseif($userDetails == 4){
                return redirect()->intended('/college_dashboard');
            }
    } else {
        // The session key 'key' does not exist
        return view('login');
    }
    
});

Route::get('/adding-admin', function () {
    return view('admin_folder/adding_admin');
});

Route::get('/admin-dashboard', function () {
    return view('admin_folder/admin_dashboard');
});

Route::get('/admin-offices', function () {
    return view('admin_folder/admin_offices', ['offices' => TblOffice::all()]);
});


Route::get('/admin-personel', function(){
    return view('admin_folder/admin_personel', ['personels' => User::all(), 'offices' => TblOffice::all()]);
});


Route::get('/budget_office_sidebar', function(){
    return view('budget_office/bo_sidebar');
});

Route::get('/bac_office_sidebar', function(){
    return view('bac_folder/bac_sidebar');
});

Route::get('/college_sidebar', function(){
    return view('college_folder/college_sidebar');
});

Route::get('/budget-office-dashboard', function(){
    return view('budget_office/bo_dashboard');
});

Route::get('/budget-office-budgets-allocation', function(){
    return view('budget_office/bo_budget_allocation', ['budgets' => TblBudget::all(), 'offices' => TblOffice::all(), 'budget_plans' => TblBudgetPlan::all()]);
});


Route::get('/budget-office-budgets-planning', function(){
    return view('budget_office/bo_budget_planning', ['budget_plans' => TblBudgetPlan::all()]);
});

Route::get('/admin-item-category', function(){
    return view('admin_folder/admin_item_categories', ['item_category' => TblItemCategory::all()]);
});

Route::get('/adding-new-departments', function(){
    return view('college_folder/college_add_new_department');
});

Route::post('/addingPersonel', [UserController::class, 'admin_add_personel']);

Route::post('/addOffices', [OfficeController::class, 'addOffices']);
Route::post('/edit-office', [OfficeController::class, 'editOffice']);
Route::post('/delete-office', [OfficeController::class, 'deleteOffice']);

Route::post('/edit-personel', [UserController::class, 'edit_personel']);
Route::post('/delete-personel', [UserController::class, 'deletePersonel']);

Route::get('/admin-sidebar', function () {
    return view('admin_folder/admin_sidebar');
});

Route::get('/admin-item', function(){
    return view('admin_folder/admin_item', ['items' => TblItem::all(), 'item_category' => TblItemCategory::all(), 'category' => TblItemCategory::all()]);
});


Route::get('/college_dashboard', function (){
    return view('college_folder/college_dashboard');
});

Route::get('/college-departments', function(){
    
    $dept = TblDepartment::where('office_id', auth()->user()->office_id)->get();

    return view('college_folder/college_my_departments', ['departments' => $dept]);
});

Route::get('/college-distribute-budget', function(){

    return view('college_folder/college_budget_distribution');
});

Route::get('/college-ppmp', function(){

    $budgets = DB::table('tbl_budgets')
    ->join('tbl_offices', 'tbl_budgets.office_id', '=', 'tbl_offices.id')
    ->join('users', 'tbl_offices.id', '=', 'users.office_id')
    ->where('users.office_id', '=', auth()->user()->office_id)
    ->select('tbl_budgets.*')
    ->get();

    return view('college_folder/college_ppmp', ['myBudgets' => $budgets]);
});

Route::post('/create-my-departments', [DepartmentController::class, 'create_department']);


Route::post('/addAdmin', [UserController::class, 'addAdmin']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/submit-budget-allocation', [BudgetController::class, 'createBudget']);

Route::post('/submit_budget_planning', [BudgetPlanController::class, 'createBudgetPlan']);

Route::post('/submit-item-category', [ItemCategoryController::class, 'createItemCategory',]);

Route::post('/submit-edit-item-category', [ItemCategoryController::class, 'editItemCategory']);

Route::post('/delete-item-category', [ItemCategoryController::class, 'deleteItemCategory']);

Route::post('/submit-new-item', [ItemsController::class, 'createItem']);

Route::post('/submit-edit-item', [ItemsController::class, 'editItems']);

Route::post('/submit-delete_item', [ItemsController::class, 'deleteItems']);

Route::post('/user-logout', [UserController::class, 'logout']);

Route::post('/bo-delete-allocation', [BudgetController::class, 'delete_allocation']);

Route::post('/budget-office-close-budget-plan', [BudgetPlanController::class, 'close_budget_plan']);

Route::post('/budget-office-reOpen-budget-plan', [BudgetPlanController::class, 'reOpen_budget_plan']);

Route::post('/budget-office-delete-budget-plan', [BudgetPlanController::class, 'delete_budget_plan']);

Route::post('/college-create-ppmp', [PpmpController::class, 'create_ppmp']);