<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\StoreDriverRequest;
use App\Http\Requests\Driver\UpdateDriverRequest;
use App\Models\Driver;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;

class DriverController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:list-driver|create-driver|edit-driver|delete-driver', ['only' => ['store', 'index']]);
        $this->middleware('permission:create-driver', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-driver', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-driver', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = null;
        if (auth()->user()->hasRole(Role::ADMIN)) {
            $driver = Driver::all();
        } else {
            // $driver = Auth::user()->getDriverList;
            $org_id = Auth::user()->hasRole(Role::SP) ? Auth::user()->id : Auth::user()->getUserDetails->organization_id;
            $driver = Driver::where('organization_id',$org_id)->get();
        }
        return view('admin.user.driver.driver-list', ['driver' => $driver]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Language::all();
        return view('admin.user.driver.add-driver',['language'=>$lang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {
        $flag = false;
        $url  = null;
        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                $url = $request->file('image')->store('public/profile');
                $flag = true;
            }
            $driver = Driver::create([
                'organization_id' => auth()->user()->hasRole(Role::SP) ? Auth::user()->id : auth()->user()->getUserDetails->organization_id,
                "name" => $request->name,
                "email" => $request->email,
                "mobile" => $request->mobile,
                "address" => $request->address,
                "liscense_no" => $request->liscense_no,
               // "directive" => $request->directive,
                "valid_until" => $request->valid_until,
                "social_security_no" => $request->social_security_no,
                "language_id" => $request->language_id,
                "location" => $request->location,
                "profile_url" => $url,
                "expired" => $request->expired == "on" ? true : false
            ]);

            // seeding user for driver
            $user =   User::create([
                "name" =>  $request->name,
                "email" => $request->email,
                "password" => Hash::make("Password@123")
            ]);
            $user->assignRole(Role::DRIVER);
            $user->givePermissionTo(Role::DRIVERPermission);


            DB::commit();
            if ($driver) {
                return redirect()->route('driver.index')->with("full-top-success", 'Driver added successfully!');
            }
            return redirect()->route('driver.index')->with("full-top-error", 'Unable to add Driver');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            if ($flag) {
                Storage::delete($url);
            }
            return redirect()->route('driver.index')->with("full-top-error", "Internal Server error");
        }
        DB::rollBack();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
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
            $driver = Driver::find($id);
            $lang = Language::all();
            if ($driver) {
                return view('admin.user.driver.update-driver', ['driver' => $driver,'language'=>$lang]);
            }
            return redirect()->route('get-user-customer')->with("full-top-error", 'Customer not found!');
        } catch (\Throwable $th) {
            return redirect()->route('get-user-customer')->with("full-top-error", $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverRequest $request, $id)
    {
        $flag = false;
        $url  = null;
        try {
            $driver =  Driver::find($id);
            if (!$driver) {
                return redirect()->route('driver.index')->with("full-top-error", 'Driver not found!');
            }
            if ($request->hasFile('image')) {
                Storage::delete($driver->profile_url);
                $url = $request->file('image')->store('public/profile');
                $flag = true;
            }
            $driver->organization_id = auth()->user()->hasRole(Role::SP) ? Auth::user()->id : auth()->user()->getUserDetails->organization_id;
            $driver->name = $request->name;
            $driver->mobile = $request->mobile;
            $driver->email = $request->email;
            $driver->address = $request->address;
            $driver->liscense_no = $request->liscense_no;
           // $driver->directive = $request->directive;
            $driver->valid_until = $request->valid_until;
            $driver->social_security_no = $request->social_security_no;
            $driver->language_id = $request->language_id;
            $driver->location = $request->location;
            $driver->profile_url = $url != null ? $url : $driver->profile_url;
            $driver->expired =  $request->expired == "on" ? true : false;
            $driver->update();
            return redirect()->route('driver.index')->with("full-top-success", 'Driver updated successfully!');
        } catch (\Throwable $th) {
            throw $th;
            if ($flag) {
                Storage::delete($url);
            }
            return redirect()->route('driver.index')->with("full-top-error", "Internal server error".$th->getMessage());
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
            $driver = Driver::find($id);
            if ($driver) {
                Storage::delete($driver->profile_url);
                $driver->delete();
                return redirect()->route('driver.index')->with("full-top-success", 'Driver deleted successfully!');
            }
            return redirect()->route('driver.index')->with("full-top-error", 'Driver not found!');
        } catch (\Throwable $th) {
            return redirect()->route('driver.index')->with("full-top-error", "Internal server error");
        }
    }
}
