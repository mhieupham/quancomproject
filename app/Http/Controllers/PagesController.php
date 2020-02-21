<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    //
    function index(){
        $foods = DB::table('foods')->get();
        return view('home')->with('foods',$foods);
    }
    function thongke(Request $request){
        $startDay = $request->startdate;
        $endDay = $request->enddate;
        if($startDay == null and $endDay == null){
            $db = DB::select(DB::raw("SELECT *,(count_food * history.price_food) as total_price FROM (SELECT foods.name_food,foods.price_food,history_buy.create_at,sum(history_buy.count_foods) as count_food FROM `history_buy` INNER JOIN foods ON history_buy.id_foods = foods.id GROUP BY foods.name_food,history_buy.create_at ORDER BY history_buy.create_at DESC) as history"));
        }else{
            $db = DB::select(DB::raw("SELECT *,(count_food * history.price_food) as total_price FROM (SELECT foods.name_food,foods.price_food,history_buy.create_at,sum(history_buy.count_foods) as count_food FROM `history_buy` INNER JOIN foods ON history_buy.id_foods = foods.id GROUP BY foods.name_food,history_buy.create_at ORDER BY history_buy.create_at DESC) as history where history.create_at BETWEEN "."'$startDay'"." AND "."'$endDay'"));
        }
        return view('thongke')->with('db',$db);
    }
}
