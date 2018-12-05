<?php 

namespace App\Http\Controllers;

use Validator;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Get List of Products
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getProducts(Request $request, Product $product)
    {
        $products = $product->getProducts($request);
        return response()->json([
            'status' => 'success',
            'result' => [
                'total' => $products->total(), 
                'rows' => $products->items()
            ],
            'messages' => null
        ]);
    }

    /**
     * Get Single Product
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getSingleProduct(Request $request)
    {
        $rules = [
            'id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $product = Product::find($request->id);
            return response()->json([
                'status' => 'success',
                'result' => $product,
                'messages' => null
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'result' => $validator->messages(),
                'messages' => null
            ]);
        }
    }

    /**
     * Create a New Product
     *
     * @access  public
     * @param   
     * @return  json(string)
     */

    public function createProduct(Request $request)
    {
        $rules = [
            'product_name' => 'required',
			'price' => 'required|integer',
			'stock' => 'required|integer',
			'images' => 'required',
			'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
        	$product = new Product;
        	$product->product_name = $request->product_name;
        	$product->price = $request->price;
        	$product->stock = $request->stock;
        	$product->images = $request->images;
        	$product->description = $request->description;
        	$product->save();

            return response()->json([
                'status' => 'success',
                'result' => null,
                'messages' => null
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'result' => $validator->messages(),
                'messages' => null
            ]);
        }
    }

    /**
     * Update Existing Product
     *
     * @access  public
     * @param   
     * @return  json(string)
     */

    public function updateProduct(Request $request)
    {
        $rules = [
            'id' => 'required',
            'product_name' => 'required',
			'price' => 'required|integer',
			'stock' => 'required|integer',
			'images' => 'required',
			'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
        	$product = Product::find($request->id);
        	$product->product_name = $request->product_name;
        	$product->price = $request->price;
        	$product->stock = $request->stock;
        	$product->images = $request->images;
        	$product->description = $request->description;
        	$product->save();

            return response()->json([
                'status' => 'success',
                'result' => null,
                'messages' => null
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'result' => $validator->messages(),
                'messages' => null
            ]);
        }
    }

    /**
     * Delete Product
     *
     * @access  public
     * @param   
     * @return  json(string)
     */

    public function deleteProduct(Request $request)
    {
        $rules = [
            'id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $product = Product::find($request->id);	
			$product->delete();

            return response()->json([
                'status' => 'success',
                'result' => null,
                'messages' => null
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'result' => $validator->messages(),
                'messages' => null
            ]);
        }
    }
}