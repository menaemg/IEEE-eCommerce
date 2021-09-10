<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
    }


    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
    }
}
