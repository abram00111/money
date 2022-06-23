<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Money;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function allIncome(){
        $incomes = Money::leftJoin('categories', 'money.category_id', '=', 'categories.id')
        ->where('status', '+')
        ->groupBy('money.id')
        ->select('money.*', 'categories.name AS catName')
        ->get();
        return view('income', [
            'incomes' => $incomes
        ]);
    }

    public function addIncome(){
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::all();
        return view('storeIncome',[
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
        ]);
    }

    public function storeIncome(){
        return redirect(route('allIncome'));
    }

    public function editIncome(){
        
    }

    public function saveIncome(){
        
    }

    public function delIncome(){
        
    }
}
