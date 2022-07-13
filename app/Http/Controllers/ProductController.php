<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = new Product();

            $product->id = Controller::generateCustomID($request->name);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->save();

            $message = "Product Created Successfully";

            return Controller::sendResponse("SUCCESS", "PCS", $message, $product);
        } catch (Exception $e) {
            $message = "Error Creating Product" . $e->getMessage();

            return Controller::sendResponse("ERROR", "ECP", $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productID)
    {
        try {
            $selectedProduct = Product::find($productID);

            $selectedProduct->id = Controller::generateCustomID($request->name);
            $selectedProduct->name = $request->name;
            $selectedProduct->price = $request->price;
            $selectedProduct->quantity = $request->quantity;
            $selectedProduct->category_id = $request->category_id;
            $selectedProduct->sub_category_id = $request->sub_category_id;
            $selectedProduct->update();

            $message = "Product Updated Successfully";

            return Controller::sendResponse("SUCCESS", "PUS", $message, $selectedProduct);
        } catch (Exception $e) {
            $message = "Error Updating Product" . $e->getMessage();

            return Controller::sendResponse("ERROR", "EUP", $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($productID)
    {
        try {
            $selectedProduct = Product::find($productID);
            $selectedProduct->delete();

            $message = "Product Deleted Successfully";

            return Controller::sendResponse("SUCCESS", "PDS", $message);
        } catch (Exception $e) {
            $message = "Error Deleting Product";

            return Controller::sendResponse("ERROR", "EPD", $message);
        }
    }
}
