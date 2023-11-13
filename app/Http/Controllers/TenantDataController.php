<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class TenantDataController extends Controller
{
    public function indexProfile()
    {
        return view('tenants.profile.index', [
            'tenant' => Tenant::where('id', auth()->user()->id)->get(),
        ]);
    }

    public function createProfile()
    {
        $tenant = Tenant::all();
        return view('tenants.profile.create', compact('tenant'));
    }

    public function storeProfile(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'logo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'batch' => 'required',
            'name' => 'required',
            'type' => 'required',
            'bussinessEntity' => 'required',
            'desc' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'other' => 'required',
            'website' => 'required',
            'companyLink' => 'required',
            'address' => 'required',
            'role' => 'required',
        ]);

        $logo = $request->file('logo');
        $filename = $logo->getClientOriginalName();
        $resize_image = Image::make($logo->getRealPath());
        $resize_image->resize(500, 400);
        $resize_image->save(public_path('storage/post-logo/' . $filename));

        if ($request->hasFile('logo')) {
            $request->logo = 'storage/post-logo/' . $request->file('logo')->getClientOriginalName();
        }

        // if ($request->hasFile('logo')) {
        //     $validatedData['logo'] = $request->file('logo')->store('post-logo');
        // }

        $tenant = Tenant::create([
            'username' => $request->username,
            'password' => $request->password,
            'logo' => $request->logo,
            'batch' => $request->batch,
            'name' => $request->name,
            'type' => $request->type,
            'bussinessEntity' => $request->bussinessEntity,
            'desc' => $request->desc,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'other' => $request->other,
            'website' => $request->website,
            'companyLink' => $request->companyLink,
            'address' => $request->address,
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

    public function editProfile()
    {
        $id = Auth::guard('tenant')->user()->id;
        $tenant = Tenant::findOrFail($id);
        return view('tenants.profile.edit', compact('tenant'));
    }

    public function updateProfile(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required',
            'logo' => 'image|mimes:jpg,png,jpeg|max:2048',
            'batch' => 'required',
            'name' => 'required',
            'type' => 'required',
            'bussinessEntity' => 'required',
            'desc' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'other' => 'required',
            'website' => 'required',
            'companyLink' => 'required',
            'address' => 'required',
        ]);

        $logo = $request->file('logo');
        $filename = $logo->getClientOriginalName();
        $resize_image = Image::make($logo->getRealPath());
        $resize_image->resize(500, 400);
        $resize_image->save(public_path('storage/post-logo/' . $filename));

        if ($request->hasFile('logo')) {
            $request->logo = 'storage/post-logo/' . $request->file('logo')->getClientOriginalName();
        }

        $tenant = Tenant::findOrFail($id);
        $tenant->update([
            'username' => $request->username,
            'logo' => $request->logo,
            'batch' => $request->batch,
            'name' => $request->name,
            'type' => $request->type,
            'bussinessEntity' => $request->bussinessEntity,
            'desc' => $request->desc,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'other' => $request->other,
            'website' => $request->website,
            'companyLink' => $request->companyLink,
            'address' => $request->address,

        ]);

        if ($tenant) {
            return redirect()
                ->route('profile.tenant.index')
                ->with(['success' => 'Data tenant telah berhasil diperbarui']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

}
