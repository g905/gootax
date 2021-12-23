<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller {

    function index() {
        //session()->flush();
        if (!session("city_id")) {
            return redirect()->route("select-city");
        }
        $city = \App\Models\City::where(["id" => session("city_id")])->first();

        return view("reviews.index", ["reviews" => $city->reviews]);
    }

    function create() {
        return view("reviews.create", ["cities" => \App\Models\City::all()->sortBy("name")]);
    }

    function save(Request $request) {
        $valid = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'city_id' => 'required',
            'rating' => 'required'
        ]);
        $review = new \App\Models\Review();
        $review->fromValid($valid);
        return redirect()->route("reviews");
    }

    function author(Request $request) {
        $author = \App\Models\User::where(['id' => $request->author_id])->first();
        $data = ['name' => $author->details->fio, 'email' => $author->details->email, 'phone' => $author->details->phone, 'id' => $author->id];
        sleep(1);
        return $data;
    }

    function reviewsByAuthor($id) {
        $author = \App\Models\User::where(['id' => $id])->first();
        $reviews = $author->reviews;
        return view('reviews.index', ["reviews" => $reviews]);
    }

}
