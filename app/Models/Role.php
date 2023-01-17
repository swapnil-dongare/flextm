<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $casts = [
        'permissions' => 'array'
    ];

    public const ROLES = ["ADMIN","ORGANIZATION", "TM", "DRIVER", "CUSTOMER"];

    public const ADMIN = 'ADMIN';
    public const SP = 'ORGANIZATION';
    public const TM = 'TM';
    public const DRIVER = 'DRIVER';
    public const CUSTOMER = 'CUSTOMER';

    public const ADMINPermission =[
        'list-sp', 'create-sp', 'edit-sp', 'delete-sp',
        'list-business-place', 'create-business-place', 'edit-business-place', 'delete-business-place',
        //'list-customer', 'create-customer', 'edit-customer', 'delete-customer',//need to remove
    ];

    public const SPPermission =  [
        'list-tm', 'create-tm', 'edit-tm', 'delete-tm',
        'list-customer', 'create-customer', 'edit-customer', 'delete-customer',
        'list-equipment', 'create-equipment', 'edit-equipment', 'delete-equipment',
    ];

    public const TMPermission = [
        'list-customer', 'create-customer', 'edit-customer', 'delete-customer',
        'list-driver', 'create-driver', 'edit-driver', 'delete-driver',
        'list-order-request', 'create-order-request', 'edit-order-request', 'delete-order-request',

    ];
    public const DRIVERPermission = [];
    public const CUSTOMERPermission = [
        'list-order-request', 'create-order-request', 'edit-order-request', 'delete-order-request',
    ];

    protected $fillable = [
        "name",
        "guard_name",
        "permissions"
    ];
}
