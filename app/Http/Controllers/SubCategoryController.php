<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function allSubCategory(){
        $subCategories = SubCategory::leftJoin('categories', 'subCategories.category_id', '=', 'categories.id')->groupBy('subCategories.id')->select('subCategories.*', 'categories.name AS nameCat')->get();
        return view('subCategory',[
            'subCategories' => $subCategories
        ]);
    }

    public function addSubCategory(){
        $categories = Category::all();
        return view('storeSubCategory',[
            'categories' => $categories
        ]);
    }

    public function storeSubCategory(Request $request){
        SubCategory::create([
            'name'=> $request->name,
            'category_id' => $request->category,
        ]);
        return redirect(route('allSubCategory'));
    }

    public function editSubCategory($id){
        
        return view('editSubCategory',[
            'subCategory' => SubCategory::find($id),
            'categories' => Category::all()
        ]);
    }

    public function saveSubCategory(Request $request){
        $subCategory = SubCategory::find($request->idSubCategory);
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->subCategory;
        $subCategory->save();
        
        return redirect(route('allSubCategory'));
    }

    public function delSubCategory($id){
        $category = SubCategory::find($id)->delete();
        
        return redirect(route('allSubCategory'));
    }


    public function subCategoryInCategory($id){
        $subCategories = SubCategory::leftJoin('categories', 'subCategories.category_id', '=', 'categories.id')->where('category_id', $id)->groupBy('subCategories.id')->select('subCategories.*', 'categories.name AS nameCat')->get();
        
        return view('subCategoryInCategory',[
            'subCategories' => $subCategories 
        ]);
    }
    
}
