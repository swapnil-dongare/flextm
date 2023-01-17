<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\AddCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-customer|create-customer|edit-customer|delete-customer', ['only' => ['addCustomer', 'getCustomerBlade']]);
        $this->middleware('permission:create-customer', ['only' => ['getAddCustomerBlade', 'addCustomer']]);
        $this->middleware('permission:edit-customer', ['only' => ['showCustomer', 'updateCustomer']]);
        $this->middleware('permission:delete-customer', ['only' => ['deleteCustomer']]);
    }
    public function getCustomerBlade()
    {

        $customer = null;
        if (auth()->user()->hasRole(Role::ADMIN)) {
            $customer = Customer::all();
        } else {
            // $customer = Auth::user()->getCustomerList;
            $org_id = Auth::user()->hasRole(Role::SP) ? Auth::user()->id : Auth::user()->getUserDetails->organization_id;
            $customer = Customer::where('organization_id',$org_id)->get();
        }
        return view('admin.user.customer.customer-list', ['customer' => $customer]);
    }
    public function getAddCustomerBlade()
    {
        return view('admin.user.customer.add-customer');
    }

    public function addCustomer(AddCustomerRequest $request)
    {

        DB::beginTransaction();
        try {
            $request->merge([
                'organization_id' => auth()->user()->hasRole(Role::SP) ? Auth::user()->id : auth()->user()->getUserDetails->organization_id,
                "newsletter" => $request->newsletter == "on" ? true : false,
                "marketing_permission" => $request->marketing_permission == 'on' ? true : false,
            ]);
            $customer = Customer::create($request->all());

            // seeding user for customer
            $user =   User::create([
                "name" => $request->name,
                "email" =>  $request->email,
                "password" => Hash::make("Password@123")
            ]);
            $user->assignRole(Role::CUSTOMER);
            $user->givePermissionTo(Role::CUSTOMERPermission);

            DB::commit();
            if ($customer) {
                return redirect()->route('get-user-customer')->with("full-top-success", 'Customer added successfully!');
            }
            return redirect()->route('get-user-customer')->with("full-top-error", 'Unable to add Customer');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with("full-top-error", $th->getMessage());
        }
    }

    public function deleteCustomer($id)
    {
        try {
            $customer = Customer::find($id);
            if ($customer) {
                $customer->delete();
                return redirect()->route('get-user-customer')->with("full-top-success", 'Customer deleted successfully!');
            }
            return redirect()->route('get-user-customer')->with("full-top-error", 'Customer not found!');
        } catch (\Throwable $th) {
            return redirect()->route('get-user-customer')->with("full-top-error", $th->getMessage());
        }
    }
    public function showCustomer($id)
    {
        try {
            $customer = Customer::find($id);
            if ($customer) {
                return view('admin.user.customer.update-customer', ['customer' => $customer]);
            }
            return redirect()->route('get-user-customer')->with("full-top-error", 'Customer not found!');
        } catch (\Throwable $th) {
            return redirect()->route('get-user-customer')->with("full-top-error", $th->getMessage());
        }
    }

    public function updateCustomer(UpdateCustomerRequest $request, $id)
    {
        try {
            $customer = Customer::find($id);
            if ($customer) {
                $customer->organization_id = auth()->user()->hasRole(Role::SP) ? Auth::user()->id : auth()->user()->getUserDetails->organization_id;
                $customer->name = $request->name;
                $customer->customer_type = $request->customer_type;
                $customer->email = $request->email;
                $customer->mobile = $request->mobile;
                $customer->company_name = $request->company_name;
                $customer->company_phone = $request->company_phone;
                $customer->vat_id = $request->vat_id;
                $customer->company_address = $request->company_address;
                $customer->company_post_address = $request->company_post_address;
                $customer->company_zipcode = $request->company_zipcode;
                $customer->company_city = $request->company_city;
                $customer->company_country = $request->company_country;
                $customer->newsletter = $request->newsletter == "on" ? true : false;
                $customer->marketing_permission = $request->marketing_permission == 'on' ? true : false;
                $customer->update();
                return redirect()->route('get-user-customer')->with("full-top-success", 'Customer updated successfully!');
            }
            return redirect()->route('get-user-customer')->with("full-top-error", 'Customer not found!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('get-user-customer')->with("full-top-error", $th->getMessage());
        }
    }
}
