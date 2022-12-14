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
        "invoice_address",
        "country",
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
