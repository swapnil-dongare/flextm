<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Role AS RoleModel;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role = ["ADMIN","ORGANIZATION", "TM", "DRIVER", "CUSTOMER"];

        foreach (RoleModel::ROLES as $key => $value) {
            Role::create(["name" => $value, "guard_name" => "web"]);
        }
    }
}
