<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\SP;
use App\Models\TM;
use App\Models\Driver;
use App\Models\Customer;
use App\Models\Role;
use App\Models\OrderRequest;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getSPList()
    {
        return $this->hasMany(SP::class, 'admin_id');
    }

    public function getTMList()
    {
        return $this->hasMany(TM::class, 'organization_id');
    }

    public function getDriverList()
    {
        return $this->hasMany(Driver::class, 'organization_id','id');
    }
    public function getCustomerList()
    {
        return $this->hasMany(Customer::class, 'organization_id');
    }
    public function getOrderRequestList()
    {
        return $this->hasMany(OrderRequest::class, 'user_id');
    }

    public function getUserDetails()
    {
        $user_email  = auth()->user()->email;
        if (auth()->user()->hasRole(Role::SP)) {

            return $this->belongsTo(SP::class, 'email', 'email');
        }else if (auth()->user()->hasRole(Role::TM)) {

            return $this->belongsTo(TM::class, 'email', 'email');
        }else if (auth()->user()->hasRole(Role::DRIVER)) {

            return $this->belongsTo(Driver::class, 'email', 'email');
        }else if (auth()->user()->hasRole(Role::CUSTOMER)) {

            return $this->belongsTo(Customer::class, 'email', 'email');
        }else{
            return $this->belongsTo(User::class);
        }
    }
}
