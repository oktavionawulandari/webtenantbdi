<?php

namespace App\Http\Controllers;

use App\Models\BackgroundCardChange;
use App\Models\TenantMembers;
use PDF;

class PrintCardController extends Controller
{
    public function idCard($id)
    {
        $tenant_members = TenantMembers::findOrFail($id);
        $card = BackgroundCardChange::latest()->first();
        // $pdf = PDF::loadView('tenants.registration.id-card', compact('tenant_members'));
        // $tenants = Tenant::all();
        // $customPaper = array(0, 0, 153, 243);
        // $customPaper = array(0, 0, 714.2857142857143, 1008.5714285714287);
        $customPaper = array(0, 0, 714.2857142857143, 1110.5714285714287);
        $pdf = PDF::loadView('tenants.registration.id-card', compact('tenant_members', 'card'))->setPaper($customPaper);

        set_time_limit(600);
        return $pdf->download($tenant_members->tenant->name . " - " . $tenant_members->short_name . '.pdf');
    }

}
