<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Auth::user())
        {
            return response()->json(['message'=>'not logged in']);
        }


        $request->validate([
            'user' => 'required',
            'item' => 'required',
        ]);



        Cart::updateOrCreate(['user_id' => $request->user, 'item_id' => $request->item]);

        return response()->json(['message' => 'success']);
 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::id();

        
        $animal = DB::table('carts')
        ->join('items','items.id','=','carts.item_id')
        ->select('carts.*','items.*')
        ->where('user_id', Auth::id())
        ->get();

    

        return view ('frontend.cart')->with('animal',$animal);


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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cart::where('item_id', $id)->firstorfail()->delete();
        return back();
    }
}
