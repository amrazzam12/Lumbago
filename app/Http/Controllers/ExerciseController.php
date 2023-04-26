<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use App\Http\Requests\ExerciseRequest;
use App\Traits\ImageUploader;


use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    use ImageUploader;

    public function index()
    {
        return view('admin.exercise.index',[
            'exercises' => Exercise::paginate(25)

        ]);
    }
    public function create()
    {
        return view('admin.exercise.create', [
            'categories' => ExerciseCategory::select('id', 'name')->get()
        ]);
    }
    public function store(ExerciseRequest $request)
    {
        try {
            $exercise = Exercise::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'focus_areas' => $request['focus_areas'],
                'duration_in_minutes' => $request['duration_in_minutes'],
                'video_link' => $request['video_link'],
                'category_id' => $request['category_id']
            ]);

            if ($request->has('icon'))
                $this->uploadImage($request, 'exercise/', $exercise, 'icon', 'icon');
            return to_route('exercise.index')->with('message', 'Exercise Added !');
        } catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }
    public function edit($id)
    {
        return view('admin.exercise.edit', [
            'exercise' => Exercise::find($id),
            'categories' => ExerciseCategory::select('id', 'name')->get()
        ]);
    }

    public function update(ExerciseRequest $request, $id)
    {
        try {
            $exercise = Exercise::find($id);

            $exercise->update([
                'name' => $request['name'],
                'description' => $request['description'],
                'focus_areas' => $request['focus_areas'],
                'duration_in_minutes' => $request['duration_in_minutes'],
                'video_link' => $request['video_link'],
                'category_id' => $request['category_id'],
            ]);

            if ($request->has('icon'))
                $this->uploadImage($request, 'exercise/', $exercise, 'icon', 'icon');
            return to_route('exercise.index')->with('message', 'Exercise Updated !');
        } catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }
    public function delete($id)
    {
        try {
            Exercise::find($id)->delete();
            return to_route('exercise.index')->with('message', "Exercise Deleted !");
        } catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }
}
