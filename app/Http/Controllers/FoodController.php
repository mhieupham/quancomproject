<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foods = DB::table('foods')->paginate(5);
        return view('foods.index')->with('foods',$foods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->input('name');
        $price = $request->input('price');
        DB::table('foods')->insert(
            [
                'name_food' => $name,
                'price_food' => $price,
                'created_at' =>now(),
                'updated_at' =>now()
            ]
        );
        return redirect('food');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
        $foods= DB::table('foods')->where('id','=',$food->id)->get()->toArray();
        $query = $foods[0];
        return view('foods.edit')->with('query',$query);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
        DB::table('foods')
            ->where('id', $food->id)
            ->update([
                'name_food' => $request->name,
                'price_food' => $request->price,
                'updated_at' =>now()
            ]);
        return redirect('food');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
        DB::table('foods')->where('id', '=', $food->id)->delete();
        return redirect('food');
    }
}
