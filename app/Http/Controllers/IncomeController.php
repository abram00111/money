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
        $categories = Category::where('income', 1)->get();
        $subCategories = SubCategory::leftJoin('categories', 'subCategories.category_id', '=', 'categories.id')->where('categories.income', 1)->select('subCategories.*')->get();
        // $products = Product::leftJoin('subCategories', 'products.subCategory_id', '=', 'subCategories.id')->leftJoin('categories', 'subCategories.category_id', '=', 'categories.id')->where('categories.income', 1)->select('products.*')->get();

        return view('storeIncome',[
            'categories' => $categories,
            'subCategories' => $subCategories,
            // 'products' => $products,
        ]);
    }

    public function storeIncome(Request $request){
        Money::create([
            'status'=> '+',
            'category_id'=> $request->category,
            'subCategory_id'=> $request->subCategory,
            'product_id'=> $request->product,
            'price'=> $request->price,
            'comment'=> $request->comment,
            'date'=> $request->date,
        ]);
        return redirect(route('allIncome'));
    }

    public function editIncome($id){
        $categories = Category::where('income', 1)->get();
        $subCategories = SubCategory::leftJoin('categories', 'subCategories.category_id', '=', 'categories.id')->where('categories.income', 1)->select('subCategories.*')->get();
        // $products = Product::leftJoin('subCategories', 'products.subCategory_id', '=', 'subCategories.id')->leftJoin('categories', 'subCategories.category_id', '=', 'categories.id')->where('categories.income', 1)->select('products.*')->get();

        return view('editIncome',[
            'categories' => $categories,
            'subCategories' => $subCategories,
            'money' => Money::find($id)

            // 'products' => $products,
        ]);
    }

    public function saveIncome(request $request){
        $income = Money::find($request->money_id);
        $income->category_id = $request->category;
        $income->subCategory_id = $request->subCategory;
        $income->product_id = $request->product;
        $income->price = $request->price;
        $income->comment = $request->comment;
        $income->date = $request->date;
        $income->save();
        return redirect(route('allIncome'));
    }

    public function delIncome($id){
        $category = Money::find($id)->delete();
        return redirect(route('allIncome'));
    }
}
