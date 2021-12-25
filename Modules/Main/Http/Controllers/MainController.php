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
        //34..4.2.3 Bad IP
        //Request::ip(); 127.0.0.1
        $token = "c8616d4e3423b210b36fa956f3dd7d4e11de2a02";
        $dadata = new \Dadata\DadataClient($token, null);
        $result = $dadata->iplocate("31.130.66.250");
        if ($result) {
            $cityName = $result["data"]["city"];
            $cityCode = \Illuminate\Support\Str::slug($cityName);
            $city = \Modules\City\Entities\City::firstOrNew(["code" => $cityCode]);
            $city->name = $cityName;
            $city->save();
            //return redirect()->route("reviews");
            return view('main::guessByIp', ['city' => $city]);
        } else {
            //throw new \Exception("cant get city name");
            return redirect()->route("select-city");
        }
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
