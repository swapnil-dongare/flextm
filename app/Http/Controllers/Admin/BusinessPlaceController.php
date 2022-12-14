<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessPlace\StoreBusinessPlaceRequest;
use App\Http\Requests\BusinessPlace\UpdateBusinessPlaceRequest;
use App\Models\BusinessPlace;

class BusinessPlaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-business-place|create-business-place|edit-business-place|delete-business-place', ['only' => ['store', 'index']]);
        $this->middleware('permission:create-business-place', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-business-place', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-business-place', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $place = BusinessPlace::all();
        return view('admin.user.business_place.business-place-list', ['place' => $place]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.business_place.add-business-place');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBusinessPlaceRequest $request)
    {
        try {
            $place = BusinessPlace::create([
                "name" => $request->name
            ]);

            if ($place) {
                return redirect()->route('business-place.index')->with("full-top-success", 'Place of business added successfully!');
            }
            return redirect()->route('business-place.index')->with("full-top-error", 'Unable to add Place of business');
        } catch (\Throwable $th) {
            return redirect()->route('business-place.index')->with("full-top-error", 'Internal Server error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $place = BusinessPlace::find($id);
            if ($place) {
                return view('admin.user.business_place.update-business-place', ['place' => $place]);
            }
            return redirect()->route('business-place.index')->with("full-top-error", 'Place of business not found!');
        } catch (\Throwable $th) {
            return redirect()->route('business-place.index')->with("full-top-error", $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBusinessPlaceRequest $request, $id)
    {

        try {
            $place = BusinessPlace::find($id);
            if (!$place) {
                return redirect()->route('business-place.index')->with("full-top-error", 'Place of Business not found!');
            }

            $place->name = $request->name;
            $place->update();
            return redirect()->route('business-place.index')->with("full-top-success", 'Place of Business added successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('business-place.index')->with("full-top-error", "Internal server error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $place = BusinessPlace::find($id);
            if ($place) {
                $place->delete();
                return redirect()->route('business-place.index')->with("full-top-success", 'Place of Business  deleted successfully!');
            }
            return redirect()->route('business-place.index')->with("full-top-error", 'Place of Business  not found!');
        } catch (\Throwable $th) {
            return redirect()->route('business-place.index')->with("full-top-error", "Internal server error");
        }
    }
}
