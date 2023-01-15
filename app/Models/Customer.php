<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'organization_id',
        'mobile',
        'email',
        'company_name',
        'company_phone',
        'vat_id',
        'company_address',
        "company_post_address",
        "company_zipcode",
        "company_city",
        "company_country",
        'newsletter',
        'marketing_permission'
    ];
    public function getAdminDetails()
    {
        return $this->belongsTo(User::class, 'tm_id', 'id');
    }


}
