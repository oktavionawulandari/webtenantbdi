<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantMembers extends Model
{
    use HasFactory;
    protected $table = 'tenant_members';

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
        'process',
        'message',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
