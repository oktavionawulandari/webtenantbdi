<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tenant extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'logo',
        'batch',
        'name',
        'type',
        'bussinessEntity',
        'desc',
        'phone',
        'whatsapp',
        'instagram',
        'facebook',
        'other',
        'website',
        'companyLink',
        'address',
        'role',
    ];

    public function usersTenant()
    {
        return $this->hasMany(UsersTenant::class, 'tenant_id', 'id');
    }
}
