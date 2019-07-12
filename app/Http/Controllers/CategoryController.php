<?php

namespace App\Http\Controllers;

use App\Category;
use File;
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
        //
        $categories = Category::all();
        return view('category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            request()->image->move(public_path('images/category/'), $image);
        }

        $category = $request->all();
        $category['image'] = $image;
        if (Category::create($category)) {
            return redirect()->route('category.index')->with('success', 'Category created successfully');
        }
        return redirect()->back()->with('failed', 'Some error occured!! Please try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        if (!empty($category->image)) {
            File::delete(asset('images/category/' . $category->image));
        }
        $image = '';
        $updateData = $request->all();
        if ($request->hasFile('image')) {
            $image = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/category/'), $image);
            $updateData['image'] = $image;
        }
        if($category->update($updateData)){
            return redirect()->route('category.index')->with('success','Category updated successfully');
        }
        return redirect()->back()->with('failed','Some error occured! rty again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return redirect()->back()->with('success', 'Category deleted successfully');
        }
        return redirect()->back()->with('failed', 'Some error occured!!! Try again');
    }
}
