<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersTenant extends Model
{
    use HasFactory;
    protected $table = 'users_tenant';

    protected $fillable = [
        'tenant_id',
        'profile',
        'ktp',
        'nik',
        'full_name',
        'short_name',
        'position',
        'birth_place',
        'birth_date',
        'gender',
        'religion',
        'status',
        'email',
        'phone',
        'education',
        'address',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
