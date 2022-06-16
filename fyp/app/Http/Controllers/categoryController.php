<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

use Session;



class categoryController extends Controller
{
    public function create()
    {
        return view('vendor.Category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50|unique:categories',
            
        ]);
        category::create([
            'name' => $request->name,
            
            
        ]);

         return back()->with('success', 'You have successfully updated a post!');

    }

    public function index()
    {

        $category = category::OrderBy('created_at', 'DESC')->get();
        $i = 1;
        return view('vendor.Category.index', compact('category', 'i'));
    }

    public function edit($id)
    {
        $cate = category::findOrFail($id);
        return view('vendor.Category.edit', compact('cate'));
    }
    public function update(Request $request, $id)
    
    {
        
        $request->validate([
            'name' => 'required',
          
        ]);

        category::find($id)->update($request->all());
        // $category->name = $request->name;
        // $category->status = $request->status;
        // $category->save();

        return redirect()->route('viewCategory')->with([
            'successful_message' => 'updated successfully'
        ]);
       
    }

    public function delete($id)
    {
        try{
            category::find($id)->delete();
        }
        catch(\Exception $exception)
        {
            return redirect()->route('viewCategory')->with([
                'error' => 'Error While Deleting'
            ]);
        }
       
        return redirect()->route('viewCategory')->with([
            'successful_message' => 'Deleted successfully'
        ]);
    }

}
