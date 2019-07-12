<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;
use File;
use App\Category;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::with('category')->get();
        return view('sub_category.index')->with('subCategories', $subCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categoryLists = Category::get(['id','name']);
        return view('sub_category.create')->with('categoryLists',$categoryLists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = '';
        if ($request->hasFile('image')) {
            $image = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/subcategory/'), $image);
        }

        $subcategory = $request->all();
        $subcategory['image'] = $image;
        if (SubCategory::create($subcategory)) {
            return redirect()->route('subcategory.index')->with('success', 'Sub Category created successfully');
        }
        return redirect()->back()->with('failed', 'Some error occured!! Please try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {   
        $categoryLists = Category::get(['id','name']);
        return view('sub_category.edit')->with(compact('categoryLists','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        //
        if (!empty($category->image)) {
            File::delete(asset('images/subcategory/' . $category->image));
        }
        $image = '';
        $updateData = $request->all();
        if ($request->hasFile('image')) {
            $image = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/category/'), $image);
            $updateData['image'] = $image;
        }
        if($subcategory->update($updateData)){
            return redirect()->route('subcategory.index')->with('success','Sub Category updated successfully');
        }
        return redirect()->back()->with('failed','Some error occured! rty again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        if ($subcategory->delete()) {
            return redirect()->back()->with('success', 'Sub Category deleted successfully');
        }
        return redirect()->back()->with('failed', 'Some error occured!!! Try again');
    }
}
