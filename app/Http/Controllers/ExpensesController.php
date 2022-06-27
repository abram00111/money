<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Money;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ExpensesController extends Controller
{
    public function allExpenses(){
        $expenses = Money::leftJoin('categories', 'money.category_id', '=', 'categories.id')
        ->where('status', '-')
        ->groupBy('money.id')
        ->select('money.*', 'categories.name AS catName')
        ->get();
        return view('expense', [
            'expenses' => $expenses
        ]);
    }

    public function addExpenses(){
        $categories = Category::where('expenses', 1)->get();
        $subCategories = SubCategory::leftJoin('categories', 'subCategories.category_id', '=', 'categories.id')->where('categories.expenses', 1)->select('subCategories.*')->get();
        // $products = Product::leftJoin('subCategories', 'products.subCategory_id', '=', 'subCategories.id')->leftJoin('categories', 'subCategories.category_id', '=', 'categories.id')->where('categories.income', 1)->select('products.*')->get();

        return view('storeExpense',[
            'categories' => $categories,
            'subCategories' => $subCategories,
            // 'products' => $products,
        ]);
    }

    public function storeExpenses(Request $request){
        dd($request->price);
    }
    public function editExpenses(){
        
    }

    public function saveExpenses(){
        
    }

    public function delExpenses(){
        
    }
}
