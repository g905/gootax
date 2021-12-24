<?php

namespace Modules\Main\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MainController extends Controller {

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        //session()->flush();
        if (!session("city_id")) {
            return redirect()->route("guess-city");
        }
        return view('main::index', ['city' => \Modules\City\Entities\City::where(['id' => session("city_id")])->first()]);
    }

    public function selectCity($city_id = null) {
        if ($city_id) {
            session(["city_id" => $city_id]);
            return redirect()->route("index");
        }
        $cities = \Modules\City\Entities\City::all();
        return view('main::select', ['cities' => $cities]);
    }

    public function selectCityForm(Request $request) {
        if ($request->by_ip) {
            session(["city_id" => $request->city_id]);
            return redirect()->route("index");
        }
        return redirect()->route("select-city");
    }

    public function guessCityByIp() {
        //31.130.66.250 Pskov
        //85.140.39.250 Izhevsk
        //46.146.26.250 Perm
        //5.45.192.250 Moscow
        //Request::ip(); 127.0.0.1
        $loc = \Stevebauman\Location\Facades\Location::get("46.146.26.250");
        if ($loc->cityName) {
            $city = \Modules\City\Entities\City::where(["name" => $loc->cityName])->first();
        } else {
            throw new \Exception("cant get city name");
        }
        if (!$city) {
            $city = new \Modules\City\Entities\City();
            $city->name = $loc->cityName;
            $city->save();
        }
        return view('main::guessByIp', ['city' => $city]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('main::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request) {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id) {
        return view('main::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id) {
        return view('main::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id) {
        //
    }

}
