<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function homeadmins()
    {
        $data = [];

        //Menampilkan jumlah admin
        $data_admin = DB::table('users')
            ->select(DB::raw('count(id) as jml_admin'))
            ->whereRaw('role="Admin"')
            ->get();
        foreach ($data_admin as $row) {
            $jml_admin = $row->jml_admin;
        }
        $data['totalAdmin'] = (int) $jml_admin;

        //Menampilkan jumlah total tenant
        $data_tenant = DB::table('tenants')
            ->select(DB::raw('count(id) as jml_tenant'))
            ->whereRaw('role="Tenant"')
            ->get();
        foreach ($data_tenant as $row) {
            $jml_tenant = $row->jml_tenant;
        }
        $data['totalTenant'] = (int) $jml_tenant;

        //Menampilkan jumlah tenant per kategori
        // Digital
        $digital = DB::table('tenants')
            ->select(DB::raw('count(id) as jml_digital'))
            ->whereRaw('type="Digital"')
            ->get();
        foreach ($digital as $row) {
            $jml_digital = $row->jml_digital;
        }
        $data['totalDigital'] = (int) $jml_digital;

        // Kriya
        $kriya = DB::table('tenants')
            ->select(DB::raw('count(id) as jml_kriya'))
            ->whereRaw('type="Kriya"')
            ->get();
        foreach ($kriya as $row) {
            $jml_kriya = $row->jml_kriya;
        }
        $data['totalKriya'] = (int) $jml_kriya;

        // Animasi
        $animasi = DB::table('tenants')
            ->select(DB::raw('count(id) as jml_animasi'))
            ->whereRaw('type="Animasi"')
            ->get();
        foreach ($animasi as $row) {
            $jml_animasi = $row->jml_animasi;
        }
        $data['totalAnimasi'] = (int) $jml_animasi;

        //Menampilkan jumlah data register
        $data_register = DB::table('tenant_members')
            ->select(DB::raw('count(id) as jml_register'))
            ->whereRaw('process="Pending"')
            ->get();
        foreach ($data_register as $row) {
            $jml_register = $row->jml_register;
        }
        $data['totalRegister'] = (int) $jml_register;

        //Menampilkan jumlah data tervalidasi
        $data_validasi = DB::table('tenant_members')
            ->select(DB::raw('count(id) as jml_validasi'))
            ->whereRaw('process="Success"')
            ->orWhereRaw('process="Failed"')
            ->get();
        foreach ($data_validasi as $row) {
            $jml_validasi = $row->jml_validasi;
        }
        $data['totalValidasi'] = (int) $jml_validasi;

        //Menampilkan jumlah data sukses
        $success = DB::table('tenant_members')
            ->select(DB::raw('count(id) as jml_success'))
            ->whereRaw('process="Success"')
            ->get();
        foreach ($success as $row) {
            $jml_success = $row->jml_success;
        }
        $data['totalSuccess'] = (int) $jml_success;

        //Menampilkan jumlah data failed
        $failed = DB::table('tenant_members')
            ->select(DB::raw('count(id) as juml_failed'))
            ->orWhereRaw('process="Failed"')
            ->get();
        foreach ($failed as $row) {
            $juml_failed = $row->juml_failed;
        }
        $data['totalFailed'] = (int) $juml_failed;

        // Menampilkan chart tenant berdasarkan batch
        $recordTtenant = DB::table('tenants')
            ->select(DB::raw('batch,count(batch) as jml'))
            ->groupBy('batch')
            ->orderBy('batch')
            ->get();
        $chart_batch = [];
        foreach ($recordTtenant as $row) {
            $chart_batch['label'][] = $row->batch;
            $chart_batch['data'][] = (int) $row->jml;
        }
        $data['chart_batch'] = json_encode($chart_batch);

        // Menampilkan chart tenant berdasarkan kategori
        $recordTtenant = DB::table('tenants')
            ->select(DB::raw('type,count(type) as jml'))
            ->groupBy('type')
            ->orderBy('type')
            ->get();
        $chart_tenant = [];
        foreach ($recordTtenant as $row) {
            $chart_tenant['label'][] = $row->type;
            $chart_tenant['data'][] = (int) $row->jml;
        }
        $data['chart_tenant'] = json_encode($chart_tenant);

        //Pengecekan role user untuk diarahkan ke halaman home masing-masing
        if (Auth::guard('user')->user()->role == "Super Admin") {
            return view('dashboard.dash-superadmin', $data);
        } elseif (Auth::guard('user')->user()->role == "Admin") {
            return view('dashboard.dash-admin', $data);
        }
    }

    public function hometenants()
    {
        $tenant = Tenant::all();
        return view('dashboard.dash-tenant', compact('tenant'));
    }
}
