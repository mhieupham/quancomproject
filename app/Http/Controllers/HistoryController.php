<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HistoryController extends Controller
{
    public function getValueWhereDate(Request $request){

        return redirect('thongke');
    }
    public function insert(Request $request){
         $name_food = explode(',',$request->name_food);
         $count_food = explode(',',$request->count_food);
        foreach( $name_food as $index => $name ) {
            $id = DB::table('foods')->select('id')->where('name_food','=',$name)->get()->toArray()[0];
            DB::table('history_buy')->insert(
                [
                    'count_foods' => $count_food[$index],
                    'id_foods' => $id->id,
                    'create_at'=>DB::raw('curdate()')
                ]
            );
        }
        return redirect('home');
    }
}
