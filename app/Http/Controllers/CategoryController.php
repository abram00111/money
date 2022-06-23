<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function allCategory(){
        $category = Category::leftJoin('subCategories', 'categories.id', '=', 'subCategories.category_id')
        ->groupBy('categories.id')
        ->select('categories.*', DB::raw('COUNT(subCategories.id) AS sum'))->get();

        return view('category',[
            'categories' => $category
        ]);
    }

    public function addCategory(){
        return view('storeCategory');
    }

    public function storeCategory(Request $request){

        Category::create([
            'name'=> $request->name,
            'income' => $request->income=='on' ? 1:0,
            'expenses' => $request->expenses=='on' ? 1:0,
        ]);
        return redirect(route('allCategory'));
    }

    public function editCategory($id){
        
        return view('editCategory',[
            'category' => Category::find($id)
        ]);
    }

    public function saveCategory(Request $request){
        $category = Category::find($request->idCategory);
        $category->name = $request->name;
        $category->income = $request->income=='on' ? 1:0;
        $category->expenses = $request->expenses=='on' ? 1:0;
        $category->save();
        
        return redirect(route('allCategory'));
    }

    public function delCategory($id){
        $category = Category::find($id)->delete();
        
        return redirect(route('allCategory'));
    }
}
