<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;
use App\Models\Equipment;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderRequest extends Model
{
    use HasFactory,SoftDeletes;

    public const REQUEST_TYPE = [
        "ORDER" => 'Order',
        "Quote" => 'Quote'
    ];

    protected $fillable = [
        'request_type',
        'customer_id',
        'organization_id','tm_id',
        'start_location', 'start_date', 'start_time', 'present_in_location',
        'end_location', 'end_date', 'end_time', 'present_in_service_hall',
        'head_count', 'mobility_restrictions', 'price', 'tax_rate', 'price_incl_tax',
        'invoiced', 'driver_id', 'equipment_id', 'route', 'language_id', 'other_wishes'
    ];

    public function getDriverDetails()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
    public function getEquipmentDetails()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
    public function getLanguageDetails()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
    public function getCustomerDetails()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function getOrganizationDetails()
    {
        return $this->belongsTo(User::class, 'organization_id');
    }
    public function getTmDetails()
    {
        return $this->belongsTo(User::class, 'tm_id');
    }

}
