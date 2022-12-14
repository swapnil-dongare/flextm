<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TM\StoreTMRequest;
use App\Models\TM;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class TMController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-tm|create-tm|edit-tm|delete-tm', ['only' => ['store', 'index']]);
        $this->middleware('permission:create-tm', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-tm', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-tm', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tm = [];
            if (auth()->user()->hasRole(Role::ADMIN)) {
                $tm  = TM::all();
            } else {
                $tm = Auth::user()->getTMList;
            }

            return view('admin.user.tm.tm-list', ['tm' => $tm]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.tm.add-tm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTMRequest $request)
    {
        DB::beginTransaction();
        try {
            $tm = TM::create([
                "organization_id" => auth()->user()->id,
                "name" => $request->name,
                "email" => $request->email
            ]);

            // seeding user for customer
            $user =   User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make("Password@123")
            ]);
            $user->assignRole(Role::TM);
            $user->givePermissionTo(Role::TMPermission);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('transport-manager.index')->with("full-top-success", 'Transport Manager added successfully!');
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
            $tm = TM::find($id);
            if ($tm) {
                return view('admin.user.tm.update-tm', ['tm' => $tm]);
            }
            return redirect()->route('transport-manager.index')->with("full-top-error", 'Transport Manager not found!');
        } catch (\Throwable $th) {
            return redirect()->route('transport-manager.index')->with("full-top-error", $th->getMessage());
        }
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
        DB::beginTransaction();
        try {
            $tm = TM::find($id);
            $user = User::where('email', $tm->email)->first();
            if (!$tm) {
                return redirect()->route('driver.index')->with("full-top-error", 'Service Provider not found!');
            }
            $tm->name = $request->name;
            $tm->email = $request->email;
            $tm->update();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('transport-manager.index')->with("full-top-success", 'Transport Manager updated successfully!');
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
            $tm = TM::find($id);
            if (!$tm) {
                return redirect()->route('transport-manager.index')->with("full-top-error", 'Transport Manager not found!');
            }
            $user = User::where('email', $tm->email)->first();
            $user->delete();
            $tm->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('transport-manager.index')->with("full-top-error", $th->getMessage());
        }
        return redirect()->route('transport-manager.index')->with("full-top-success", 'Transport Manager deleted successfully!');
    }
}
