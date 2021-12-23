<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller {

    function index() {
        //session()->flush();
        if (session("city_id")) {
            return redirect()->route("reviews");
        }
        return redirect()->route("select-city");
    }

    function selectCity($city_id = null) {
        if (!$city_id) {
            return view("index", ["cities" => \App\Models\City::all(), "ip_city" => $this->guessCity()]);
        } else {
            session(["city_id" => $city_id]);
            return redirect()->route("reviews");
        }
    }

    function selectCityForm(Request $request) {
        if (!$request->by_ip) {
            return view("index", ["cities" => \App\Models\City::all()]);
        } else {
            return redirect()->route("select-city", ["city_id" => $request->city_id]);
        }
    }

    private function guessCity() {
        //31.130.66.250 Pskov
        //85.140.39.250 Izhevsk
        //46.146.26.250 Perm
        //5.45.192.250 Moscow
        $loc = \Stevebauman\Location\Facades\Location::get("5.45.192.250");
        if ($loc->cityName) {
            $city = \App\Models\City::where(["name" => $loc->cityName])->first();
        } else {
            throw new \Exception("cant get city name");
        }
        if ($city) {
            return $city;
        } else {
            $city = new \App\Models\City();
            $city->name = $loc->cityName;
            $city->save();
            return null;
        }
    }

}
