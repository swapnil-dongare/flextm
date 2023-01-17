<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SP\StoreSPRequest;
use App\Http\Requests\SP\UpdateSPRequest;
use App\Models\SP;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendCreateUserEMailJob;
use App\Models\Language;


class SPController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-sp|create-sp|edit-sp|delete-sp', ['only' => ['store', 'index']]);
        $this->middleware('permission:create-sp', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-sp', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-sp', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sp = null;
        if (auth()->user()->hasRole(Role::ADMIN)) {
            $sp  = SP::all()->except(auth()->user()->id);
        } else {
            $sp = Auth::user()->getSPList;
        }

        return view('admin.user.sp.sp-list', ['sp' => $sp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = Language::all();
        return view('admin.user.sp.add-sp', ['language' => $lang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSPRequest $request)
    {
        // dd($request->all());
        $flag = false;
        $url  = null;
        DB::beginTransaction();
        try {
            if ($request->hasFile('logo_url')) {
                $url = $request->file('logo_url')->store('public/sp/logo');
                $flag = true;
            }

            $request->merge([
                "admin_id" => auth()->user()->id,
                "address" => $request->company_address,
                "free_trial" => $request->free_trial == "on" ? true : false,
                "logo_url" => $url
            ]);

            $sp = SP::create($request->all());

            // seeding user for customer
            $user =   User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make("Password@123")
            ]);
            $user->assignRole(Role::SP);
            $user->givePermissionTo(Role::SPPermission);
            dispatch(new SendCreateUserEMailJob($sp));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            if ($flag) {
                Storage::delete($url);
            }
            throw $th;
        }
        return redirect()->route('organization.index')->with("full-top-success", 'Service Provider added successfully!');
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
            $sp = SP::find($id);
            $lang = Language::all();
            if ($sp) {
                return view('admin.user.sp.update-sp', ['sp' => $sp, 'language' => $lang]);
            }
            return redirect()->route('organization.index')->with("full-top-error", 'Service Provider not found!');
        } catch (\Throwable $th) {
            return redirect()->route('organization.index')->with("full-top-error", $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSPRequest $request, $id)
    {
        // dd($request->all());
        $flag = false;
        $url  = null;
        DB::beginTransaction();
        try {
            $sp = SP::find($id);
            $user = User::where('email', $sp->email)->first();
            if (!$sp) {
                return redirect()->route('driver.index')->with("full-top-error", 'Service Provider not found!');
            }
            if ($request->hasFile('logo_url')) {
                Storage::delete($sp->logo_url);
                $url = $request->file('logo_url')->store('public/sp/logo');
                $flag = true;
            }

            $sp->name = $request->name;
            $sp->mobile = $request->mobile;
            $sp->email = $request->email;
            $sp->vat_id = $request->vat_id;
            $sp->address = $request->company_address;
            $sp->post_address = $request->post_address;
            $sp->zipcode = $request->zipcode;
            $sp->city = $request->city;
            $sp->country = $request->country;
            $sp->invoice_address = $request->invoice_address;
            $sp->post_invoice_address = $request->post_invoice_address;
            $sp->zipcode_invoice_address = $request->zipcode_invoice_address;
            $sp->city_invoice_address = $request->city_invoice_address;
            $sp->country_invoice_address = $request->country_invoice_address;
            $sp->language_id = $request->language_id;
            $sp->free_trial = $request->free_trial == "on" ? true : false;
            $sp->subscription = $request->subscription;
            $sp->free_trial_end_date = $request->free_trial_end_date;
            $sp->logo_url = $url != null ? $url : $sp->logo_url;
            $sp->update();

            $user->email = $request->email;
            $user->name = $request->name;
            $user->update();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('organization.index')->with("full-top-success", 'Service Provider updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $sp = SP::find($id);
            if (!$sp) {
                return redirect()->route('organization.index')->with("full-top-error", 'Service Provider not found!');
            }
            $user = User::where('email', $sp->email)->first();
            $user->delete();
            $sp->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('organization.index')->with("full-top-error", $th->getMessage());
        }
        return redirect()->route('organization.index')->with("full-top-success", 'Service Provider deleted successfully!');
    }
}
