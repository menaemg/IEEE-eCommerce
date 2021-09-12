<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
    }





    public function create()
    {
        return view('addProduct');
    }





    public function store(Request $request)
    {
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
            'description' => 'required|min:3|max:255',
            'path' => 'nullable',
            'price' => 'required|numeric',
            'number_of' => 'required|numeric',
        ]);

        $product = Product::find($id);

        $product->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'number_of'=> $request->number_of
        ]);

        if ($request->path) {
            $product->path = $request->path->store('images', 'public');
        }

        $product->save;

        return redirect()->back()->with('msg','Product saved!');
    }


    public function destroy($id)
    {
    }
}
