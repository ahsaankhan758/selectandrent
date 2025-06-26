<?php

namespace App\Http\Controllers\Admin\Cars;

use App\Http\Controllers\Controller;
use App\Models\CarCategory;
use Illuminate\Http\Request;
use Auth;

class CarCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CarCategory::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.cars.carCategories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|unique:car_categories',
        ]);
        $category = new CarCategory;
        $category->name = $validatedData['name'];
        $category->save();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Created [Category Name '.$validatedData['name'].'] Successfully.';
        $action = 'Create';
        $module = 'Category';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('carCategories')->with('status','Car Category Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CarCategory::find($id);
        if($category->cars()->exists())
            {
                return redirect()->route('carCategories')-> with('statusDanger','Can Not Delete Category. Please Delete Child Table Entries First To Delete Category');
            }
        $category->delete();
       // save logs
       $userId = Auth::id();
       $userName = Auth::user()->name;
       $desciption = $userName.' Deleted [Category Name '.$category['name'].'] Successfully.';
       $action = 'Delete';
       $module = 'Category';
       activityLog($userId, $desciption,$action,$module);
        return redirect()->route('carCategories')->with('status','Car Category Deleted Successfully.');
    }
}
