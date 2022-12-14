<?php

namespace Database\Seeders;

use App\Models\SP;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Role AS RoleModel;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $SPPermission =  [
        //     'list-sp', 'create-sp', 'edit-sp', 'delete-sp',
        //     'list-tm', 'create-tm', 'edit-tm', 'delete-tm',
        //     'list-customer', 'create-customer', 'edit-customer', 'delete-customer',
        //     'list-driver', 'create-driver', 'edit-driver', 'delete-driver',
        //     'list-equipment', 'create-equipment', 'edit-equipment', 'delete-equipment',
        //     'list-business-place', 'create-business-place', 'edit-business-place', 'delete-business-place',
        //     'list-order-request', 'create-order-request', 'edit-order-request', 'delete-order-request',
        // ];

        // // $SPPermission = [
        // //     'list-tm', 'create-tm', 'edit-tm', 'delete-tm',
        // // ];
        // $TMPermission = [
        //     'list-customer', 'create-customer', 'edit-customer', 'delete-customer',
        //     'list-driver', 'create-driver', 'edit-driver', 'delete-driver',
        //     'list-order-request', 'create-order-request', 'edit-order-request', 'delete-order-request',

        // ];
        // $DRIVERPermission = [];
        // $CUSTOMERPermission = [
        //     'list-order-request', 'create-order-request', 'edit-order-request', 'delete-order-request',
        // ];



        // seeding user for admin
        $user =   User::create([
            "name" => "Admin",
            "email" => "admin@mindmote.com",
            "password" => Hash::make("Password@123")
        ]);
        $user->assignRole('ADMIN');
        $user->givePermissionTo(RoleModel::ADMINPermission);

        $sp = SP::create([
            "admin_id" => $user->id,
            "name" => 'Admin',
            "mobile" => '9922050325',
            "email" => 'admin@mindmote.com',
            "vat_id" => 123243,
            "address" => 'Street:  Ahlströminkatu 85 City:  Joensuu  State/province/area:   North Karelia  Phone number  042 025 8325  Zip code  80007  Country calling code  +358  Country  Finland',
            "invoice_address" => 'Street:  Ahlströminkatu 85 City:  Joensuu  State/province/area:   North Karelia  Phone number  042 025 8325  Zip code  80007  Country calling code  +358  Country  Finland',
            "country" => 'Finland',
            "language_id" => 1,
            "free_trial" => true,
            "subscription" => true,
            "logo_url" => ''
        ]);


        // seeding user for SP
        // $user =   User::create([
        //     "name" => "SP",
        //     "email" => "sp@gmail.com",
        //     "password" => Hash::make("Sp@123")
        // ]);
        // $user->assignRole('SP');
        // $user->givePermissionTo($SPPermission);

        // seeding user for TM
        // $user =   User::create([
        //     "name" => "TM",
        //     "email" => "tm@gmail.com",
        //     "password" => Hash::make("Tm@123")
        // ]);
        // $user->assignRole('TM');
        // $user->givePermissionTo($TMPermission);

        // seeding user for driver
        // $user =   User::create([
        //     "name" => "DRIVER",
        //     "email" => "driver@gmail.com",
        //     "password" => Hash::make("Driver@123")
        // ]);
        // $user->assignRole('DRIVER');
        // $user->givePermissionTo($DRIVERPermission);


        // seeding user for customer
        // $user =   User::create([
        //     "name" => "CUSTOMER",
        //     "email" => "Customer@gmail.com",
        //     "password" => Hash::make("Customer@123")
        // ]);
        // $user->assignRole('CUSTOMER');
        // $user->givePermissionTo($CUSTOMERPermission);
    }
}
