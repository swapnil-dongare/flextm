<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;


class Driver extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'organization_id', 'name', 'mobile', 'email', "address", "liscense_no", "directive",
        "valid_until", "social_security_no", "language_id", "profile_url", "expired"
    ];

    public function getAdminDetails()
    {
        return $this->belongsTo(User::class, 'tm_id', 'id');
    }
}
