<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SP extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "admin_id",
        "name",
        "mobile",
        "email",
        "vat_id",
        "address",
        "post_address",
        "zipcode",
        "city",
        "country",
        "invoice_address",
        "post_invoice_address",
        "zipcode_invoice_address",
        "city_invoice_address",
        "country_invoice_address",
        "language_id",
        "free_trial",
        "subscription",
        "logo_url"
    ];

    public function getAdminDetails()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
