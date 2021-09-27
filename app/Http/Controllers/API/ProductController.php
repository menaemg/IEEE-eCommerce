<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // get all products "api/product"
    public function index(): \Illuminate\Http\JsonResponse
    {

       $products= Product::all();
        return response()->json($products);


    }

    // get single product "api/product/{id}"
    public function show($id): \Illuminate\Http\JsonResponse
    {
     $products = Product::findOrFail($id);
      return response()->json($products);
    }
}
