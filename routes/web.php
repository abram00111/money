<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SubCategoryController;
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

Route::get('/', [IndexController::class, 'index']);


Route::get('/category', [CategoryController::class, 'allCategory'])->name('allCategory');
Route::get('/addCategory', [CategoryController::class, 'addCategory'])->name('addCategory');
Route::post('/storeCategory', [CategoryController::class, 'storeCategory'])->name('storeCategory');
Route::get('/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
Route::post('/saveCategory', [CategoryController::class, 'saveCategory'])->name('saveCategory');
Route::get('/delCategory/{id}', [CategoryController::class, 'delCategory'])->name('delCategory');

Route::get('/subCategory', [SubCategoryController::class, 'allSubCategory'])->name('allSubCategory');
Route::get('/subCategoryInCategory/{id}', [SubCategoryController::class, 'subCategoryInCategory'])->name('subCategoryInCategory');
Route::get('/addSubCategory', [SubCategoryController::class, 'addSubCategory'])->name('addSubCategory');
Route::post('/storeSubCategory', [SubCategoryController::class, 'storeSubCategory'])->name('storeSubCategory');
Route::get('/editSubCategory/{id}', [SubCategoryController::class, 'editSubCategory'])->name('editSubCategory');
Route::post('/saveSubCategory', [SubCategoryController::class, 'saveSubCategory'])->name('saveSubCategory');
Route::get('/delSubCategory/{id}', [SubCategoryController::class, 'delSubCategory'])->name('delSubCategory');

Route::get('/income', [IncomeController::class, 'allIncome'])->name('allIncome');
Route::get('/addIncome', [IncomeController::class, 'addIncome'])->name('addIncome');
Route::post('/storeIncome', [IncomeController::class, 'storeIncome'])->name('storeIncome');
Route::get('/editIncome/{id}', [IncomeController::class, 'editIncome'])->name('editIncome');
Route::post('/saveIncome', [IncomeController::class, 'saveIncome'])->name('saveIncome');
Route::get('/delIncome/{id}', [IncomeController::class, 'delIncome'])->name('delIncome');

Route::get('/expenses', [ExpensesController::class, 'allExpenses'])->name('allExpenses');
Route::get('/addExpenses', [ExpensesController::class, 'addExpenses'])->name('addExpenses');
Route::post('/storeExpenses', [ExpensesController::class, 'storeExpenses'])->name('storeExpenses');
Route::get('/editExpenses/{id}', [ExpensesController::class, 'editExpenses'])->name('editExpenses');
Route::post('/saveExpenses', [ExpensesController::class, 'saveExpenses'])->name('saveExpenses');
Route::get('/delExpenses/{id}', [ExpensesController::class, 'delExpenses'])->name('delExpenses');


