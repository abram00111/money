<?php

namespace App\Http\Controllers;

use App\Models\Money;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $moneys = Money::leftJoin('categories', 'money.category_id', '=', 'categories.id')
        ->orderBy('date', 'DESC')
        ->select('money.*', 'categories.name AS category')
        ->get();
        return view('index',[
            'moneys' => $moneys
        ]);
    }
}
