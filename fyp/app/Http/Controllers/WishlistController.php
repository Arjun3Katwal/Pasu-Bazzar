<?php



namespace App\Http\Controllers;
use DB;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
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



        Wishlist::updateOrCreate(['user_id' => $request->user, 'item_id' => $request->item]);
        
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

        
        $animal = DB::table('wishlists')
        ->join('items','items.id','=','wishlists.item_id')
        ->select('wishlists.*','items.*')
        ->where('user_id', Auth::id())
        ->get();

    

        return view ('frontend.wishlist')->with('animal',$animal);


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
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function remove(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        wishlist::where('item_id', $id)->firstorfail()->delete();
        return back();
    }
}
