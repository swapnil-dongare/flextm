<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'list-sp', 'create-sp', 'edit-sp', 'delete-sp',
            'list-tm', 'create-tm', 'edit-tm', 'delete-tm',
            'list-customer', 'create-customer', 'edit-customer', 'delete-customer',
            'list-driver', 'create-driver', 'edit-driver', 'delete-driver',
            'list-equipment', 'create-equipment', 'edit-equipment', 'delete-equipment',
            'list-business-place', 'create-business-place', 'edit-business-place', 'delete-business-place',
            'list-order-request', 'create-order-request', 'edit-order-request', 'delete-order-request',
        ];

        foreach ($permissions as $key => $value) {
            Permission::create([
                "name" => $value,
                "guard_name" => "web",
            ]);
        }
    }
}
