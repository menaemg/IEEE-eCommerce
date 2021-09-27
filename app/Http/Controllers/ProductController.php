<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

    public function index()
    {
        $data = Product::all();
        return view('content')->with('data',$data);
    }





    public function create()
    {
        return view('addProduct');
    }





    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:1000',
            'path' => 'nullable',
            'price' => 'required|numeric',
            'number_of' => 'required|numeric',
        ]);

        Product::create(
            [
                'name'=> $request->name,
                'description'=> $request->description,
                'path'=> $request->path,
                'price'=> $request->price,
                'number_of'=> $request->number_of
            ]
        );
        return redirect()->back()->with('msg','Product saved!');
    }




    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view( 'showProduct' , compact('product'));
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view( 'editProduct' , compact('product'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:1000',
            'path' => 'nullable',
            'price' => 'required|numeric',
            'number_of' => 'required|numeric',
        ]);

        $product = Product::find($id);

        if ($request->path == null) {
            $image = $product->path;
        } else {
            $image = $request->path->store('images', 'public');
        }

        $product->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'path' => $image,
            'price'=> $request->price,
            'number_of'=> $request->number_of
        ]);

        $product->save;

        return redirect()->back()->with('msg','Product saved!');
    }


    public function destroy($id)
    {

        Product::findorfail($id)->delete();
        return  redirect()->route('product.index')->with('msg','Element is deleted successfully');

    }
}
