<?php

use App\Models\User;
use App\Models\TblItem;
use App\Models\TblPpmp;
use App\Models\TblBudget;
use App\Models\TblOffice;
use App\Models\TblBudgetPlan;
use App\Models\TblDepartment;
use App\Models\TblItemCategory;
use App\Models\TblPurchasedItem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpmpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\BudgetPlanController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\PurchasedItemsController;

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
                return redirect()->intended('/bac-office-sidebar');
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

Route::get('/bac-office-dashboard', function(){
    return view('bac_folder/bac_dashboard');
});

Route::get('/bac-college-unit', function(){
    return view('bac_folder/bac_college');
});

Route::get('/bac-office-budgets-allocation', function(){
    return view('bac_folder/bac_budgets');
});

Route::get('/bac-office-reports', function(){
    return view('bac_folder/bac_reports');
});

Route::get('/bac-office-ppmp', function(){

    $bac_ppmp = TblPpmp::where('for_year', date("Y") + 1)
                        ->where('ppmp_status', 1)
                        ->get();

    return view('bac_folder/bac_ppmp', ['bac_ppmp_unconsol' => $bac_ppmp]);
});

Route::get('/college_sidebar', function(){
    return view('college_folder/college_sidebar');
});

Route::get('/budget-office-dashboard', function(){
    return view('budget_office/bo_dashboard');
});

Route::get('/budget-office-ppmp', function(){
    
    $pending_ppmp = TblPpmp::where('for_year', 2024)
                ->where('ppmp_status', 1)
                ->get();

    return view('budget_office/bo_ppmp', ['pending_ppmp' => $pending_ppmp]);
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

Route::get('/search-items', [ItemsController::class, 'searchItems']);

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

    $my_ppmps = DB::table('tbl_budget_plans')
    ->join('tbl_budgets', 'tbl_budget_plans.id', '=', 'tbl_budgets.budget_plan_id')
    ->join('users', 'tbl_budgets.office_id', '=', 'users.office_id')
    ->join('tbl_ppmps', 'users.office_id', '=', 'tbl_ppmps.office_id')
    ->where('users.office_id', '=', auth()->user()->office_id)
    ->select('tbl_budget_plans.*', 'tbl_ppmps.*', 'tbl_budgets.*', 'tbl_ppmps.id as ppmp_id')
    ->get();


    return view('college_folder/college_ppmp', ['myBudgets' => $budgets, 'myppmp' => $my_ppmps]);
});

Route::get('/college-ppmp/ppmp={ppmp_id}', function($ppmp_id){

    $userId = auth()->user()->id;
    
    $result = DB::table('tbl_purchased_items')
    ->join('tbl_offices', 'tbl_purchased_items.office_id', '=', 'tbl_offices.id')
    ->join('tbl_ppmps', 'tbl_purchased_items.ppmp_id', '=', 'tbl_ppmps.id')
    ->join('users', 'tbl_purchased_items.user_id', '=', 'users.id')
    ->join('tbl_item_categories', 'tbl_purchased_items.item_category_id', '=', 'tbl_item_categories.id')
    ->join('tbl_items', function ($join) {
        $join->on('tbl_purchased_items.item_id', '=', 'tbl_items.id')
             ->on('tbl_purchased_items.item_code', '=', 'tbl_items.item_code')
             ->on('tbl_item_categories.id', '=', 'tbl_items.item_category_id');
    })
    ->where('users.id', $userId)
    ->select('tbl_purchased_items.*', 'tbl_offices.*', 'tbl_ppmps.*', 'users.*', 'tbl_item_categories.*', 'tbl_items.*', 'tbl_purchased_items.id as purchased_item_id')
    ->get();

    $my_purchased_purchase_item_no_available = TblPurchasedItem::join('users', 'tbl_purchased_items.user_id', '=', 'users.id')
    ->where('users.id', $userId)
    ->where('ppmp_part', 2)
    ->select('users.*', 'tbl_purchased_items.*', 'tbl_purchased_items.id as purchased_item_id')
    ->get();



    

    $get_ppmp_details = TblPpmp::where('ppmp_code', '=', $ppmp_id)->first(); // Use first() to retrieve a single row
    
    $budgets_details = TblBudget::find($get_ppmp_details->budget_id);
    
    return view('college_folder/college_purchase_item', compact('get_ppmp_details'), ['items' => TblItem::all(), 'my_purchased_items' => $result, 'budgets_details' => $budgets_details, 'my_purchased_purchase_item_no_available' => $my_purchased_purchase_item_no_available]);
});

Route::post('/college-remove-purchased-item', [PurchasedItemsController::class, 'college_remove_item']);

Route::post('/college-remove-purchased-item_na', [PurchasedItemsController::class, 'college_remove_item_na']);

Route::post('/college-add-item-ppmp', [PurchasedItemsController::class, 'college_add_item']);

Route::post('/college-add-item-ppmp_not_available', [PurchasedItemsController::class, 'college_add_item_not_there']);

Route::get('/get-item-details/{itemId}', [ItemsController::class, 'getItemDetails']);

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

Route::post('/college_generate_my_ppmp', [PurchasedItemsController::class, 'generate_purhcased_item']);
