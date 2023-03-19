<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "reg_no",
        'organization_id',
        "amount_of_seats",
        "disablity",
        "reg_year",
        "emmission_classification",
        "next_inspection",
        "place_of_business",
        "maintenance",
        "equipments_in_vehicle"
    ];

    public function getBusinessPlace()
    {
        return $this->belongsTo(BusinessPlace::class, 'place_of_business');
    }

    public function setNextInspectionAttribute($value)
    {
        $this->attributes['next_inspection'] = (new Carbon($value))->format('Y-m-d');
    }
    public function getNextInspectionAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }
}
