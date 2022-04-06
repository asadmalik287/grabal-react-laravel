<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard_name = 'web';
    protected $fillable = [
        'name',
        'email',
        'password',
        'f_name',
        'l_name',
        'phone_number',
        'address',
        'email',
        'password',
        'confirm_password',
        'dob',
        'name',
        'country',
        'gender',
        'town',
        'is_verified',
        'business_name',
        'contact_person',
        'phone_number',
        'email',
        'vetting_doc',
        'vaccinations_doc',
        'certifications_doc',
        'message',
        'role_id',
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

    public function hasService()
    {
        return $this->hasMany(Service::class, 'added_by');
    }

    public function subscriptions()
    {
        return $this->hasOne(Subscription::class,'user_id');
    }
}
