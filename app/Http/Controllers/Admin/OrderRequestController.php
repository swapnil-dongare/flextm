<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Equipment;
use App\Models\Language;
use App\Models\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use Exception;
use Illuminate\Support\Facades\Auth;

class OrderRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            'permission:list-order-request|create-order-request|edit-order-request|delete-order-request',
            ['only' => ['store', 'index']]
        );
        $this->middleware('permission:create-order-request', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('permission:edit-order-request', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('permission:delete-order-request', [
            'only' => ['destroy'],
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole(Role::ADMIN)){
            $order = OrderRequest::all();
        }else{
            // $order = auth()->user()->getOrderRequestList;
            $org_id = Auth::user()->hasRole(Role::SP) ? Auth::user()->id : Auth::user()->getUserDetails->organization_id;
            $order = OrderRequest::where('organization_id',$org_id)->get();
        }
        return view('admin.order.order-list', ['order' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $org_id = Auth::user()->hasRole(Role::SP) ? Auth::user()->id : Auth::user()->getUserDetails->organization_id;
        $lang = Language::all();
        $driver = Driver::where('organization_id',$org_id)->get();
        $equipment = Equipment::where('organization_id',$org_id)->get();
        $customers = Customer::where('organization_id',$org_id)->get();
        // dd(auth()->user())->getUserDetails;
        // dd($equipment);
        return view('admin.order.add-order', [
            'language' => $lang,
            'equipment' => $equipment,
            'driver' => $driver,
            'customer'=>$customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        // dd($request->all());
        try {
            $org_id = Auth::user()->hasRole(Role::SP) ? Auth::user()->id : Auth::user()->getUserDetails->organization_id;
            $tm_id = Auth::user()->hasRole(Role::TM) ? Auth::user()->id : null;
            $request->merge([
                "mobility_restrictions"=>$request->mobility_restrictions == 'on' ? 1 : 0,
                "invoiced"=>$request->invoiced == 'on' ? 1 : 0,
                "organization_id"=>$org_id,
                "tm_id"=>$tm_id
            ]);
            // dd($request->all());
            $order = OrderRequest::create($request->all());
            return redirect()
                ->route('order-request.index')
                ->with('full-top-success', 'Order request added successfully!');
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('full-top-error', $th->getMessage());
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
        $order = OrderRequest::find($id);
        $lang = Language::all();
        $driver = Driver::all();
        $equipment = Equipment::all();
        return view('admin.order.update-order', ['order' => $order,'language' => $lang,
        'equipment' => $equipment,
        'driver' => $driver,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            $order = OrderRequest::find($id);
            if(! $order){
              throw new Exception("No request found!");
            }
            $order->delete();
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('full-top-error', $th->getMessage());
        }
        return redirect()
                ->route('order-request.index')
                ->with('full-top-success', 'Order request deleted successfully!');
    }
}
