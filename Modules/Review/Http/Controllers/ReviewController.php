<?php

namespace Modules\Review\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReviewController extends Controller {

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        if (!session("city_id")) {
            return redirect()->route("index");
        }
        $city = \Modules\City\Entities\City::where(["id" => session("city_id")])->first();
        return view("review::index", ["reviews" => $city->reviews]);
    }

    function author(Request $request) {
        $author = \Modules\User\Entities\User::where(['id' => $request->author_id])->first();
        $data = ['name' => $author->details->fio, 'email' => $author->details->email, 'phone' => $author->details->phone, 'id' => $author->id];
        sleep(1);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('review::create');
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
        return view('review::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id) {
        return view('review::edit');
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
