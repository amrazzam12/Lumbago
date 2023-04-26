<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        $users = User::all();
        $clinics = Clinic::all();
        return view('admin.review.index', compact('reviews', 'users', 'clinics'));
    }


    public function create()
    {
        return view('admin.review.create',[
            'users' => User::select('id', 'name')->get(),
            'clinics' => Clinic::select('id')->get()
        ]);
    }
    public function store(ReviewRequest $request)
    {
        try {
            Review::create([
                'review' => $request['review'],
                'rate' => $request['rate'],
                'user_id' => $request['user_id'],
                'clinic_id' => $request['clinic_id']

            ]);
            return to_route('review.index')->with('message', "Review Added !");
        } catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $users = User::select('id', 'name')->get();
        $clinics = Clinic::select('id')->get();

        return view('admin.review.edit', compact('review', 'users', 'clinics'));
    }

    public function update(ReviewRequest $request, $id)
    {
        try {
            $review = Review::find($id);
            $review->update([
                'review' => $request['review'],
                'rate' => $request['rate'],
                'user_id' => $request['user_id'],
                'clinic_id' => $request['clinic_id']
            ]);
            return to_route('review.index')->with('message', "Review Updated !");
        } catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }

    public function delete($id)
    {
        try {
            Review::find($id)->delete();
            return to_route('review.index')->with('message', " Review Deleted !");
        } catch (\Exception $e) {
            return back()->with('error', "Something Went Wrong");
        }
    }
}
