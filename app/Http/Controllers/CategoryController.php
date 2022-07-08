<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $categories = Category::all();

            $message = "List Of Categories Successfully Obtained";

            return Controller::sendResponse("SUCCESS", "LOCSO", $message, $categories);
        }
        catch (Exception $e)
        {
            $message = "Error Getting Categories List" . $e->getMessage();

            return Controller::sendResponse("SUCCESS", "EGCL", $message);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();

        $category->id = Controller::generateCustomID($request->name);
        $category->name = $request->name;

        try
        {
            $category->save();

            $message = "Category Successfully Created";

            return Controller::sendResponse("SUCCESS", "CSC", $message, $category);
        }
        catch (Exception $e)
        {
            $message = "Error Creating Category" . $e->getMessage();

            return Controller::sendResponse("ERROR", "ECC", $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryID)
    {
        try {
            $selectedCategory = Category::find($categoryID);

            $selectedCategory->name = $request->name;
            $selectedCategory->update();

            $message = "Category Successfully Updated";

            return Controller::sendResponse("SUCCESS", "CSU", $message, $selectedCategory);
        } catch (Exception $e) {
            $message = "Error Updating Category" . $e->getMessage();

            return Controller::sendResponse("ERROR", "EUC", $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryID)
    {
        try {
            $selectedCategory = Category::find($categoryID);
            $selectedCategory->delete();

            $message = "Category Successfully Deleted";

            return Controller::sendResponse("SUCCESS", "CSD", $message);
        } catch (Exception $e) {
            $message = "Error Deleting Category" . $e->getMessage();

            return Controller::sendResponse("ERROR", "EDC", $message);
        }
    }
}
