<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\StoreEquipmentRequest;
use App\Http\Requests\Equipment\UpdateEquipmentRequest;
use App\Models\BusinessPlace;
use App\Models\Equipment;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-equipment|create-equipment|edit-equipment|delete-equipment', ['only' => ['store', 'index']]);
        $this->middleware('permission:create-equipment', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-equipment', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-equipment', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipment = null;
        if (auth()->user()->hasRole(Role::ADMIN)) {
            $equipment = Equipment::all();
        } else {
            $org_id = Auth::user()->hasRole(Role::SP) ? Auth::user()->id : Auth::user()->getUserDetails->organization_id;
            $equipment = Equipment::where('organization_id',$org_id)->get();
        }
        return view('admin.user.equipment.equipment-list', ['equipment' => $equipment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $place = BusinessPlace::all();
        return view('admin.user.equipment.add-equipment', ['place' => $place]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipmentRequest $request)
    {
        try {
            $equipment = Equipment::create([
                "reg_no" => $request->reg_no,
                'organization_id' => auth()->user()->hasRole(Role::SP) ? Auth::user()->id : auth()->user()->getUserDetails->organization_id,
                "amount_of_seats" => $request->amount_of_seats,
                "disablity" => $request->disablity == "on" ?  true : false,
                "reg_year" => $request->reg_year,
                "emmission_classification" => $request->emmission_classification,
                "next_inspection" => $request->next_inspection,
                "place_of_business" => $request->place_of_business,
                "maintenance" => $request->maintenance,
                "equipments_in_vehicle"=>$request->equipments_in_vehicle
            ]);

            if ($equipment) {
                return redirect()->route('equipment.index')->with("full-top-success", 'Equipment added successfully!');
            }
            return redirect()->route('equipment.index')->with("full-top-error", 'Unable to add Equipment');
        } catch (\Exception $th) {
            return redirect()->route('equipment.create')->with("full-top-error", 'Internal Server error'.$th->getMessage());
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
            $equipment = Equipment::find($id);
            $place = BusinessPlace::all();
            if ($equipment) {
                return view('admin.user.equipment.update-equipment', ['equipment' => $equipment, 'place' => $place]);
            }
            return redirect()->route('equipment.index')->with("full-top-error", 'Equipment not found!');
        } catch (\Throwable $th) {
            return redirect()->route('equipment.index')->with("full-top-error", $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentRequest $request, $id)
    {

        try {
            $equipment = Equipment::find($id);
            if (!$equipment) {
                return redirect()->route('equipment.index')->with("full-top-error", 'Equipment not found!');
            }
            $equipment->organization_id = auth()->user()->hasRole(Role::SP) ? Auth::user()->id : auth()->user()->getUserDetails->organization_id;
            $equipment->reg_no = $request->reg_no;
            $equipment->amount_of_seats = $request->amount_of_seats;
            $equipment->disablity = $request->disablity == "on" ?  true : false;
            $equipment->reg_year = $request->reg_year;
            $equipment->emmission_classification = $request->emmission_classification;
            $equipment->next_inspection = $request->next_inspection;
            $equipment->place_of_business = $request->place_of_business;
            $equipment->maintenance = $request->maintenance;
            $equipment->update();
            return redirect()->route('equipment.index')->with("full-top-success", 'Equipment added successfully!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('equipment.index')->with("full-top-error", "Internal server error");
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
            $equipment = Equipment::find($id);
            if ($equipment) {
                $equipment->delete();
                return redirect()->route('equipment.index')->with("full-top-success", 'Equipment deleted successfully!');
            }
            return redirect()->route('equipment.index')->with("full-top-error", 'Equipment not found!');
        } catch (\Throwable $th) {
            return redirect()->route('equipment.index')->with("full-top-error", "Internal server error");
        }
    }
}
