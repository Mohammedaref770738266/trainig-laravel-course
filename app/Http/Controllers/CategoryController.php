<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::paginate(25);
        return view('categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        if(Category::create(
            [
                'name'=>$request->name,
                'description'=>$request->description,
                'type'=>$request->type,
                'status'=>isset($request->status)
            ]
            ))
        {
            toastr()->success("create done successfully");
        }
        else{
            toastr()->error("something went wrong");
        }
            return redirect(route('categories.index')) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($category ->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'type'=>$request->type,
            'status'=>isset($request->status)
        ])) {
            toastr()->success("update done successfully");
        }
        else{
            toastr()->error("something went wrong");
        }
        return redirect(route('categories.index')) ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category ->delete()) {
            toastr()->success("delete done successfully");
        }
        else{
            toastr()->error("something went wrong");
        }
        return redirect(route('categories.index'));
    }
}
