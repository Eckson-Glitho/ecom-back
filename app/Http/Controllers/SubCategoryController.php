<?php

namespace App\Http\Controllers;

use App\Models\Sub_category;
use Exception;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
            $sub_category = new Sub_category();

            $sub_category->id = Controller::generateCustomID($request->name);
            $sub_category->name = $request->name;
            $sub_category->category_id = $request->category_id;
            $sub_category->save();

            $message = "Sub Category Successfully Created";

            return Controller::sendResponse("SUCCESS", "SCSC", $message, $sub_category);
        } catch (Exception $e) {
            $message = "Error Creating Sub Category" . $e->getMessage();

            return Controller::sendResponse("ERROR", "ECSC", $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_category $sub_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub_category $sub_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sub_category)
    {
        try {
            $selectedSubCategory = Sub_category::find($sub_category);

            $selectedSubCategory->name = $request->name;
            $selectedSubCategory->category_id = $request->category_id;
            $selectedSubCategory->update();

            $message = "Sub Category Successfully Updated";

            return Controller::sendResponse("SUCCESS", "SCSU", $message, $selectedSubCategory);
        } catch (Exception $e) {
            $message = "Error Updating Sub Category" . $e->getMessage();

            return Controller::sendResponse("ERROR", "EUSC", $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_category $sub_category)
    {
        //
    }
}
