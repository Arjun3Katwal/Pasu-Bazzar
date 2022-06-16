<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\category;

class itemController extends Controller
{
    public function create()
    {
        $category = category::all();
        $i=1;
        $items = Item::all();
        
        return view('vendor.Items.create', compact('category', 'i'));
    }

    public function show($id){
        $product =Item::find($id);
        $i = 1;
        return view('vendor.Items.show',compact('product','i'));
    }

   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50|unique:items',
            // 'category_id' => 'required|min:2|max:50|unique:items',
            'description' => 'required|min:2|max:50|unique:items',
            'cost_price' => 'required|min:2|max:50|unique:items',
        
            
        ]);

       
        $data = array(
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'cost_price'=>$request->cost_price,
        );
        if ($image= $request->file('image')){
        $imageName=time().$image->getClientOriginalName();
        $image->move('uploads/product/images/', $imageName);
        $data['image'] = $imageName;
        }
        $create = Item::create($data);
        return redirect()->route('viewProduct');



    }
    public function index()
    {
        $product = Item::get();
        $i = 1;
        // dd($product);
        return view('vendor.Items.index', compact('product', 'i'));
    }

    public function edit($id)
    {
        $pro = Item::findOrFail($id);
        $category = category::all();
        $i = 1;
        return view('vendor.Items.edit', compact('pro','category','i'));
    }
    public function update(Request $request, item $item)
    {
      $id= $request->id;
      $data = array(
        'name'=>$request->name,
        'category_id'=>$request->category_id,
        'description'=>$request->description,
        'cost_price'=>$request->cost_price,
        
      );

        // if($request->file('image')){
        //     $image = $request->image;
        //     $image_new_name = time().$image->getClientOriginalName();
        //     $image->move('img', $image_new_name);
        //     $data['image']= $image_new_name;
        // }
        if ($image= $request->file('image')){
            $imageName=time().$image->getClientOriginalName();
            $image->move('uploads/product/images/', $imageName);
            $data['image'] = $imageName;
            }

        $create = Item::where('id',$id)->update($data);
     

        return redirect()->route('viewProduct');
    }

    public function productstatus($id){
        $producttype = Item::find($id)
        ->select('status')
        ->where('id','=',$id)
        ->first();

        if($producttype->status == '1'){
            $status = '0';
        }else{
            $status= '1';
        }
        $values = array('status' => $status);
        Item::find($id)->where('id','=', $id)->update($values);

     //    session()->flash('msg','Prouduct status has been updated successfully.');
     // session()->success('we will contact soon')->persistent('close')->autoclose(3500);
        return back()->with('success','you have successfully update');

    }

    public function delete($id){
        Item::find($id)->delete();
        return redirect()->route('viewProduct')->with([
            'successful_message' => 'Deleted successfully'
        ]);
    }
}
