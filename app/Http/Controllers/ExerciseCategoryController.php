<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseCategoryRequest;
use App\Models\ExerciseCategory;

use Illuminate\Http\Request;

class ExerciseCategoryController extends Controller
{
    public function index(){
        return view('admin.categories.index' , [
            'categories' => ExerciseCategory::all()
        ]);
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(ExerciseCategoryRequest $request)
    {
        try {
            ExerciseCategory::create([
                'name' => $request['name'],
                'description' => $request['description']
            ]);
            return to_route('categories.index')->with('message', "Category Added !");
        } catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }

    public function edit($id)
    {
        return view('admin.categories.edit', [
            'category' => ExerciseCategory::find($id)
        ]);
    }

    public function update(ExerciseCategoryRequest $request, $id)
    {
        try {
            $spec = ExerciseCategory::find($id);
            $spec->update([
                'name' => $request['name'],
                'description' => $request['description']
            ]);
            return to_route('categories.index')->with('message', "Category Updated !");
        } catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }

    public function delete($id)
    {
        try {
            ExerciseCategory::find($id)->delete();
            return to_route('categories.index')->with('message', "Category Deleted !");
        } catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }
}
