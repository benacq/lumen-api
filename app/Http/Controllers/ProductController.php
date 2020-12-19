<?php


namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function showAllProducts(): JsonResponse
    {
        return response()->json(Product::all());
    }

    public function showOneProduct($id): JsonResponse
    {
        return response()->json(Product::find($id));
    }


    public function create(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'product_name' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'discount' => 'required'
            ]);
        } catch (ValidationException $e) {
            var_dump($e);
        }
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }


    public function update($id, Request $request): JsonResponse
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }


    public function delete($id): JsonResponse
    {
        Product::findOrFail($id)->delete();
        return response()->json([
        ], 204);
    }
}
