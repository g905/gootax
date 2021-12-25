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
        //session()->flush();
        if (!session("city_id")) {
            return redirect()->route("index");
        }
        $city = \Modules\City\Entities\City::where(["id" => session("city_id")])->first();
        return view("review::index", ["reviews" => $city->reviews]);
    }

    function author(Request $request) {
        $author = \Modules\User\Entities\User::find($request->author_id);
        $data = ['name' => $author->details->fio, 'email' => $author->details->email, 'phone' => $author->details->phone, 'id' => $author->id];
        sleep(1);
        return $data;
    }

    function reviewsByAuthor($id) {
        $author = \Modules\User\Entities\User::where(['id' => $id])->first();
        $reviews = $author->reviews;
        return view('review::index', ["reviews" => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request) {
        if ($request->ajax()) {
            sleep(10);
            return view('review::includes.modals.addReviewFormModal');
        }
    }

    private function getCitiesHttp() {
        $response = \Illuminate\Support\Facades\Http::get('https://gist.githubusercontent.com/gorborukov/0722a93c35dfba96337b/raw/435b297ac6d90d13a68935e1ec7a69a225969e58/russia');
        $cities = [];
        if ($response->successful()) {
            foreach ($response->json() as $place) {
                $cities[] = $place["city"];
            };
        }
        asort($cities);
        return $cities;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request) {
        sleep(1);
        $valid = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'attach' => 'mimes:jpg,png,pdf',
            'city' => 'required',
            'rating' => 'required'
        ]);
        $valid["attach"] = "";
        if ($request->file('attach')) {
            $path = $request->attach->store('files');
            $valid["attach"] = $path;
        }

        $cityCode = \Illuminate\Support\Str::slug($valid["city"]);

        $city = \Modules\City\Entities\City::where(['code' => $cityCode])->firstOrNew(["name" => $valid["city"]]);
        $city->code = $cityCode;
        $city->save();
        $valid['city_id'] = $city->id;
        $review = new \Modules\Review\Entities\Review();
        $review->fromValid($valid);
        return redirect()->back();
    }

    public function download($id) {
        return \Illuminate\Support\Facades\Storage::download(\Modules\Review\Entities\Review::find($id)->img);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id) {
        $review = \Modules\Review\Entities\Review::find($id);
        return view('review::includes.modals.editReviewFormModal', ['review' => $review]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request) {
        if ($request->ajax()) {
            sleep(1);
            $review = \Modules\Review\Entities\Review::find($request->id);
            return view('review::includes.modals.editReviewFormModal', ['review' => $review]);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id) {
        sleep(1);
        $valid = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'attach' => 'mimes:jpg,png,pdf',
            'city' => 'required',
            'rating' => 'required'
        ]);
        $valid["attach"] = "";
        if ($request->file('attach') != null) {
            $path = $request->attach->store('files');
            $valid["attach"] = $path;
        }
        $cityCode = \Illuminate\Support\Str::slug($valid["city"]);

        $city = \Modules\City\Entities\City::where(['code' => $cityCode])->firstOrNew(["name" => $valid["city"]]);
        $city->code = $cityCode;
        $city->save();
        $valid['city_id'] = $city->id;
        $review = \Modules\Review\Entities\Review::find($id);
        $review->fromValid($valid);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id) {
        if (\Modules\Review\Entities\Review::destroy($id)) {
            return redirect()->back();
        } else {
            throw new \Exception("cant destroy");
        }
    }

}
