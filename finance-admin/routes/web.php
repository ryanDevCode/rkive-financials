<?php

use App\Http\Controllers\Admin\TravelExpenseController;
use App\Http\Controllers\Admin\TravelRequestController;
use App\Http\Controllers\Fragments\AuthBoard;
use App\Http\Controllers\Fragments\BoardController;
use App\Http\Controllers\Fragments\BudgetTracking;
use App\Http\Middleware\Auth\CheckRole as checkRole;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Livewire::setUpdateRoute(function ($handle) {
//     return Route::post('/finance-admin/livewire/update', $handle);
// });

Route::get('/', function () {
    return redirect()->route('index');
})->name('/');

Route::view('index', 'index')->name('index');

Route::group(['prefix' => '/terms'], function () {
    Route::get('policy', [BoardController::class, 'policy'])->name('policy');
    Route::get('responsibility', [BoardController::class, 'responsibility'])->name('responsibility');
    Route::get('punishment', [BoardController::class, 'punishment'])->name('punishment');
});

Route::group(['prefix' => '/auth'], function () {
    Route::get('/login', [AuthBoard::class, 'login'])->name('login');
    Route::get('/register', [AuthBoard::class, 'register'])->name('register');
    Route::get('/reset', [AuthBoard::class, 'reset'])->name('reset');
    Route::get('/block', [AuthBoard::class, 'block'])->name('block');
    Route::post('/logout', [AuthBoard::class, 'logout'])->name('logout');
});


Route::middleware(['auth', checkRole::class . ':102'])->group(function () {

    Route::group(['prefix' => '/admin'], function () {
        Route::get('/dashboard', [BoardController::class, 'index'])->name('admin');
    });

    // Plans
    Route::get('/budget', [BoardController::class, 'budget'])->name('admin.budgets');
    Route::get('/addrequest', [BoardController::class, 'addbudget'])->name('admin.addbudgets');
    Route::get('/cashflow', [BoardController::class, 'cashflow'])->name('admin.cashflow');
    Route::get('/balance', [BoardController::class, 'balance'])->name('admin.balance');
    Route::get('/income', [BoardController::class, 'income'])->name('admin.income');
    Route::get('/recievable', [BoardController::class, 'recievable'])->name('admin.recievable');
    Route::get('/payable', [BoardController::class, 'payable'])->name('admin.payable');
    Route::get('/turnover', [BoardController::class, 'turnover'])->name('admin.turnover');
    Route::get('/sales', [BoardController::class, 'sales'])->name('admin.sales');

    // // Budget Tracker
    Route::get('/budget-tracker', [BudgetTracking::class, 'budgetPlan'])->name('admin.budgetPlan');
    Route::get('/view-budget-expenses/{id}', [BudgetTracking::class, 'budgetPlanExpenses'])->name('admin.budgetPlanExpenses');
    Route::get('/expenses', [BudgetTracking::class, 'budgetExpense'])->name('admin.budgetExpense');
    Route::get('/view-expenses/{id}', [BudgetTracking::class, 'viewBudgetExpense'])->name('admin.viewBudgetExpense');
    Route::post('/view-expenses/{id}', [BudgetTracking::class, 'saveBudgetExpense'])->name('admin.saveBudgetExpense');

    // Additional Data
    Route::get('/department', [BoardController::class, 'department'])->name('admin.department');
    Route::get('/role', [BoardController::class, 'role'])->name('admin.roles');
    Route::get('/users', [BoardController::class, 'users'])->name('admin.users');

    // Analytics
    Route::get('/analytics', [BoardController::class, 'analytics'])->name('admin.analytics');

    // Reporting
    Route::get('/reporting', [BoardController::class, 'report'])->name('admin.report');


    //Travel
    Route::resource('admin/travel-requests', TravelRequestController::class)->names('travel');
    Route::get('admin/travel-requests/search', 'TravelRequestController@search')->name('travel.search');
    Route::resource('admin/travel-expenses', TravelExpenseController::class)->names('travel-expense');
});


Route::middleware(['auth', checkRole::class . ':103'])->group(function () {

    Route::group(['prefix' => '/user'], function () {
        Route::get('/dashboard', [BoardController::class, 'index'])->name('user');

        // Plans
        Route::get('/budget', [BoardController::class, 'budget'])->name('user.budgets');
        Route::get('/addrequest', [BoardController::class, 'addbudget'])->name('user.addbudgets');
        Route::get('/cashflow', [BoardController::class, 'cashflow'])->name('user.cashflow');
        Route::get('/balance', [BoardController::class, 'balance'])->name('user.balance');
        Route::get('/income', [BoardController::class, 'income'])->name('user.income');
        Route::get('/recievable', [BoardController::class, 'recievable'])->name('user.recievable');
        Route::get('/payable', [BoardController::class, 'payable'])->name('user.payable');
        Route::get('/turnover', [BoardController::class, 'turnover'])->name('user.turnover');
        Route::get('/sales', [BoardController::class, 'sales'])->name('user.sales');

        // Analytics
        Route::get('/analytics', [BoardController::class, 'analytics'])->name('user.analytics');
    });
});
