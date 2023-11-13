<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\TenantMembers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use PDF;

class TenantMembersController extends Controller
{
    public function index(Request $request)
    {
        // $tenant_members = TenantMembers::where('tenant_id', auth()->user()->id)->paginate(5);
        // $filterKeyword = $request->get('keyword');
        // if ($filterKeyword) {
        //     $tenant_members = TenantMembers::where('process', 'like', "%$filterKeyword%")->paginate(5);
        // }

        // return view('tenants.registration.data-validation', ['tenant_members' => $tenant_members]);

        return view('tenants.registration.data-validation', [
            'tenant_members' => TenantMembers::where('tenant_id', auth()->user()->id)->get(),
            'tenant' => Tenant::all(),
        ]);

    }

    public function create()
    {
        $tenants = User::all();
        $tenant_members = TenantMembers::all();
        $tenant = Tenant::all();
        return view('tenants.registration.card-registration', compact('tenants', 'tenant_members', 'tenant'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'profile' => 'image|file|max:6024',
            'ktp' => 'image|file|max:6024',
            'nik' => 'required|unique:tenant_members',
            'full_name' => 'required',
            'short_name' => 'required',
            'position' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'status' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'education' => 'required',
            'address' => 'required',
            'process' => 'required',
            'message' => 'required',
        ]);

        $validatedData['tenant_id'] = auth()->user()->id;

        $profile = $request->file('profile');
        $filename = $profile->getClientOriginalName();
        $resize_image = Image::make($profile->getRealPath());
        $resize_image->resize(500, 400);
        $resize_image->save(public_path('storage/post-profile/' . $filename));

        if ($request->hasFile('profile')) {
            // $validatedData['profile'] = $request->file('profile')->store('post-profile');
            $validatedData['profile'] = $request->profile = 'storage/post-profile/' . $request->file('profile')->getClientOriginalName();
        }

        $ktp = $request->file('ktp');
        $filename = $ktp->getClientOriginalName();
        $resize_ktp = Image::make($ktp->getRealPath());
        $resize_ktp->resize(500, 400);
        $resize_ktp->save(public_path('storage/post-ktp/' . $filename));

        if ($request->hasFile('ktp')) {
            //$validatedData['ktp'] = $request->file('ktp')->store('post-ktp');
            $validatedData['ktp'] = $request->ktp = 'storage/post-ktp/' . $request->file('ktp')->getClientOriginalName();
        }

        TenantMembers::create($validatedData);

        if ($validatedData) {
            return redirect()
                ->route('members.validation')
                ->with(['success' => 'Pengajuan kartu tenant telah berhasil dilakukan']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    public function showDetails($id)
    {
        $data = array(
            'tenant_members' => TenantMembers::find($id),
            'tenants' => Tenant::all(),
        );
        return view('tenants.registration.show-details')->with($data);
    }

    public function editMember($id)
    {
        $tenant_members = TenantMembers::findOrFail($id);
        return view('tenants.registration.edit-data', compact('tenant_members'));
    }

    public function updateMember(Request $request, $id)
    {
        $this->validate($request, [
            'profile' => 'image|file|max:6024',
            'ktp' => 'image|file|max:6024',
            'nik' => 'required',
            'full_name' => 'required',
            'short_name' => 'required',
            'position' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'status' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'education' => 'required',
            'address' => 'required',
            'process' => 'required',
            'message' => 'required',
        ]);

        $profile = $request->file('profile');
        $filename = $profile->getClientOriginalName();
        $resize_image = Image::make($profile->getRealPath());
        $resize_image->resize(500, 400);
        $resize_image->save(public_path('storage/post-profile/' . $filename));

        if ($request->hasFile('profile')) {
            if ($request->oldProfile) {
                Storage::delete($request->oldProfile);
            }
            $request->profile = 'storage/post-profile/' . $request->file('profile')->getClientOriginalName();
            // $request->profile = $request->file('profile')->store('post-profile');
            // $validatedData['profile'] = $request->file('profile')->store('post-profile');
            //$request->file('profile')->move(public_path('storage/post-profile/'), $request->file('profile')->getClientOriginalName());
            // $request->profile = 'storage/post-profile/' . $request->file('profile')->getClientOriginalName();
        }

        $ktp = $request->file('ktp');
        $filename = $ktp->getClientOriginalName();
        $resize_image = Image::make($ktp->getRealPath());
        $resize_image->resize(500, 400);
        $resize_image->save(public_path('storage/post-ktp/' . $filename));

        if ($request->hasFile('ktp')) {
            if ($request->oldKTP) {
                Storage::delete($request->oldKTP);
            }
            $request->ktp = 'storage/post-ktp/' . $request->file('ktp')->getClientOriginalName();
            // $validatedData['ktp'] = $request->file('ktp')->store('post-ktp');
            //$request->file('ktp')->move(public_path('storage/post-ktp/'), $request->file('ktp')->getClientOriginalName());
            // $request->ktp = $request->file('ktp')->store('post-ktp');

        }

        $tenant_members = TenantMembers::findOrFail($id);
        // TenantMembers::updated($validatedData);

        $tenant_members->update([
            'profile' => $request->profile,
            'ktp' => $request->ktp,
            'nik' => $request->nik,
            'full_name' => $request->full_name,
            'short_name' => $request->short_name,
            'position' => $request->position,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'status' => $request->status,
            'email' => $request->email,
            'phone' => $request->phone,
            'education' => $request->education,
            'address' => $request->address,
            'process' => $request->process,
            'message' => $request->message,
        ]);

        if ($tenant_members) {
            return redirect()
                ->route('members.validation')
                ->with(['success' => 'Data tenant telah berhasil diperbarui']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    function print() {

        return view('tenants.registration.print-data', [
            'tenant_members' => TenantMembers::where('process', "Success")->where('tenant_id', auth()->user()->id)->get(),
        ]);

    }

    public function cardInfo()
    {
        $tenants = User::all();
        $tenant = Tenant::all();
        $tenant_members = TenantMembers::all();
        return view('tenants.card-info', compact('tenants', 'tenant_members', 'tenant'));
    }

    public function terms()
    {
        $tenants = User::all();
        $tenant = Tenant::all();
        $tenant_members = TenantMembers::all();
        return view('tenants.terms-conditions', compact('tenants', 'tenant_members', 'tenant'));
    }
    public function tenantPdf($id)
    {
        $tenant_members = TenantMembers::findOrFail($id);
        // $tenants = Tenant::all();
        $pdf = PDF::loadView('tenants.registration.tenant-pdf', compact('tenant_members'));

        set_time_limit(600);
        return $pdf->download('TenantMember.pdf');
    }
}
