<?php

namespace App\Http\Controllers;

use App\Exports\ExportProfileTenant;
use App\Exports\ExportValidate;
use App\Models\BackgroundCardChange;
use App\Models\Tenant;
use App\Models\TenantMembers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class AdminController extends Controller
{
    // UNTUK SUPER ADMIN
    public function akunAdmin()
    {
        $admins = User::where('role', "Admin")->get();
        return view('admins.accounts.admins.index', compact('admins'));
    }
    public function createAdmin()
    {
        $admins = User::all();
        return view('admins.accounts.admins.create-admin', compact('admins'));
    }
    public function storeAdmin(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|unique:users',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|string|min:5',
            'phone' => 'required',
            'role' => 'required',

        ]);

        $admin = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        if ($admin) {
            return redirect()
                ->route('superadmin.admin.account')
                ->with(['success' => 'Pendaftaran admin telah berhasil dilakukan']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    public function editAdmin($id)
    {
        $admin = User::findOrFail($id);
        return view('admins.accounts.admins.edit-admin', compact('admin'));
    }
    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'nip' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);

        $admin = User::findOrFail($id);
        $admin->update([
            'nip' => $request->nip,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        if ($admin) {
            return redirect()
                ->route('superadmin.admin.account')
                ->with(['success' => 'Data admin telah berhasil diperbarui']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    public function destroyAdmin($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        if ($admin) {
            return redirect()
                ->route('superadmin.admin.account')
                ->with([
                    'success' => 'Data telah berhasil dihapus',
                ]);
        } else {
            return redirect()
                ->route('superadmin.akun.admin')
                ->with([
                    'error' => 'Terjadi kesalahan. Silakan coba kembali',
                ]);
        }
    }

    public function adminPDF()
    {
        $adminPDF = User::where('role', "Admin")->get();

        $data = [
            'title' => 'Data Admin',
            'date' => date('m/d/Y'),
            'adminPDF' => $adminPDF,
        ];

        $pdf = PDF::loadView('admins.accounts.admins.export-admin-pdf', $data);

        set_time_limit(600);

        return $pdf->download('data-admin.pdf');
    }

    public function adminExcel()
    {
        return Excel::download(new ExportValidate, 'data-admin.xlsx');
    }

    //UNTUK SUPER ADMIN & ADMIN
    public function indexTenant()
    {
        $tenants = Tenant::all();
        return view('admins.accounts.tenants.index', compact('tenants'));
    }

    public function createTenant()
    {
        $tenants = Tenant::all();
        return view('admins.accounts.tenants.create-tenant', compact('tenants'));
    }

    public function storeTenant(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'name' => 'required',
            'role' => 'required',
        ]);

        $tenant = Tenant::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'role' => $request->role,

        ]);

        if ($tenant) {
            return redirect()
                ->route('home.tenants')
                ->with(['success' => 'Pendaftaran admin telah berhasil dilakukan']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    public function editTenant($id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('admins.accounts.tenants.edit-tenant', compact('tenant'));
    }

    public function updateTenant(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            // 'email' => 'required',
            'phone' => 'required',
            // 'role' => 'required',
        ]);

        $tenant = Tenant::findOrFail($id);
        $tenant->update([
            'name' => $request->name,
            'username' => $request->username,
            // 'email' => $request->email,
            'phone' => $request->phone,
            // 'role' => $request->role,
        ]);

        if ($tenant) {
            return redirect()
                ->route('admins.tenants.account')
                ->with(['success' => 'Data tenant telah berhasil diperbarui']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    public function destroyTenant($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();
        if ($tenant) {
            return redirect()
                ->route('admins.tenant.account')
                ->with([
                    'success' => 'Data tenant telah berhasil dihapus',
                ]);
        } else {
            return redirect()
                ->route('admins.tenant.account')
                ->with([
                    'error' => 'Terjadi kesalahan. Silakan coba kembali',
                ]);
        }
    }

    public function showDetails($id)
    {
        $data = array(
            'tenant' => Tenant::find($id),
        );
        return view('admins.accounts.tenants.show-details')->with($data);
    }

    //REGISTRATION AND VALIDATION
    public function registration()
    {
        $tenant_members = TenantMembers::where('process', "Pending")->get();
        return view('admins.validation.data-register', compact('tenant_members'));
    }

    public function registrationDetail($id)
    {
        $data = array(
            'tenant_members' => TenantMembers::find($id),
            'tenants' => Tenant::all(),
        );
        return view('admins.validation.show-data')->with($data);
    }

    public function validation()
    {
        $tenant_members = TenantMembers::where('process', "Success")->orWhere('process', 'Failed')->get();
        return view('admins.validation.data-validated', compact('tenant_members'));
    }

    public function validationDetail($id)
    {
        $data = array(
            'tenant_members' => TenantMembers::find($id),
            'tenants' => Tenant::all(),
        );
        return view('admins.validation.show-data')->with($data);
    }

    public function statusSuccess($id)
    {
        $tenant_members = TenantMembers::findOrFail($id);
        $tenant_members = DB::table('tenant_members')->where('id', $id)->first();

        $new_status = $tenant_members->process;

        if ($new_status == 'Pending') {
            DB::table('tenant_members')->where('id', $id)->update([
                'process' => 'Success',
            ]);
        }
        if ($tenant_members) {
            return redirect()
                ->route('admins.validation')
                ->with(['success' => 'Data berhasil diubah']);
        }
    }

    public function statusFailed(Request $request, $id)
    {
        $tenant_members = DB::table('tenant_members')->where('id', $id)->first();

        $tenant_members = TenantMembers::findOrFail($id);
        $tenant_members->process = $request->get('process');
        $tenant_members->message = $request->get('message');
        $tenant_members->save();
        return redirect()->route('admins.validation', [$tenant_members->id]);

        if ($tenant_members) {
            return redirect()
                ->route('admins.validation')
                ->with(['success' => 'Proses validasi telah berhasil dilakukan']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    //Get Users Tenant
    public function tenantMembers()
    {
        $tenants = Tenant::all();
        $tenant_members = TenantMembers::all();
        return view('admins.accounts.tenants.tenant-members', compact('tenants', 'tenant_members'));
    }

    public function showDetailsTenant($id)
    {
        $data = array(
            'tenant_members' => TenantMembers::find($id),
            'tenants' => Tenant::all(),
        );
        return view('admins.validation.show-data')->with($data);
    }

    // BACKGROUND CARD CHANGE
    public function changeIdCard()
    {
        $card = BackgroundCardChange::all();
        return view('admins.background-card', compact('card'));
    }

    public function storeCard(Request $request)
    {
        $this->validate($request, [
            'card' => 'required|image|file|max:6024',
        ]);

        if ($request->hasFile('card')) {
            $request->file('card')->move(public_path('storage/card-images/'), $request->file('card')->getClientOriginalName());

            $request->card = 'storage/card-images/' . $request->file('card')->getClientOriginalName();
        }

        $cardId = BackgroundCardChange::create([
            'card' => $request->card,
        ]);

        if ($cardId) {
            return redirect()
                ->route('background.card.change')
                ->with(['success' => 'Background card telah berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with(['error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    // EXPORT PDF & EXCEL
    public function validatedPdf()
    {
        $validPdf = TenantMembers::all();

        $pdf = PDF::loadView('admins.validation.export-pdf', compact('validPdf'))->setPaper('a4', 'landscape');

        set_time_limit(600);
        return $pdf->download('tenant-validated.pdf');
    }

    public function profileTenantPDF()
    {
        $profileTenantPDF = Tenant::all();

        $pdf = PDF::loadView('admins.accounts.tenants.tenant-profile-pdf', compact('profileTenantPDF'))->setPaper('a4', 'landscape');

        set_time_limit(600);
        return $pdf->download('tenant-profile.pdf');
    }

    public function validateExcel()
    {
        return Excel::download(new ExportValidate, 'validate-data.xlsx');
    }
    public function profileExcel()
    {
        return Excel::download(new ExportProfileTenant, 'profile-tenant-data.xlsx');
    }

}
