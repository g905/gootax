<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller {

    function index() {
        if (!session("city_id")) {
            return redirect()->route("select-city");
        }
        $city = \App\Models\City::where(["id" => session("city_id")])->first();
        //dd($city->reviews);
        return view("reviews", ["reviews" => $city->reviews]);
    }

}
