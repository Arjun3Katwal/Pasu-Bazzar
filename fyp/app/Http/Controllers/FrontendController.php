<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\item;
use App\Models\Category;
use App\Models\Rating;
use Auth;


class FrontendController extends Controller
{
    //
    public function home(){
        $animal = item::where('status','=', 1)->get();
        return view('frontend.home')->with('animal', $animal);
    }
    public function details($id){
        $item = Item::where('id', $id)->first();
        // return $item;

        //rating
        $rating = Rating::where('items_id', $id)->get();
        $rating_sum = Rating::where('items_id', $id)->sum('stars_rated');

        $my_rating = Rating::where('items_id', $id)->where('user_id', Auth::id())->first();

        if ($rating->count() > 0){
            $avg = $rating_sum / $rating->count();
        }
        else{
            $avg = 0;
        }
        

        return view('frontend.details', compact('item', 'rating', 'avg', 'my_rating'));
    }
  
    public function contact(){
        return view('frontend.contact');
    }

   

    public function about(){
        return view('frontend.about');
    }

    public function categories($id){
        $item = Item::where('category_id', $id)->get();
        // return $category;
       return view('frontend.productsearch', compact('item'));
    }

    public function productsearch(Request $request){
        $item = item::where('name', 'like', '%'.$request->search.'%')->get();
        
  
        return view('frontend.productsearch')->with('item', $item);
    }

   

    public function checkout(){
        return view('frontend.checkout');
    }
}

