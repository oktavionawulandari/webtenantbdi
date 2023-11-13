<?php

namespace App\Exports;

use App\Models\Tenant;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportProfileTenant implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // for selecting specific fields
        return Tenant::select(
            'id',
            'name',
            'batch',
            'type',
            'bussinessEntity',
            'desc',
            'phone',
            'whatsapp',
            'instagram',
            'facebook',
            'other',
            'companyLink',
            'address'
            )->get();
        // for selecting all fields
        // return ProductList::all();
    }

    public function headings(): array
        {
            //Put Here Header Name That you want in your excel sheet 
            return [
                'No',
                'Nama Tim',
                'Angkatan',
                'Jenis Usaha',
                'Badan Usaha',
                'Deskripsi Singkat',
                'No Telepon',
                'Whatsapp',
                'Instagram',
                'Facebook',
                'Lainnya',
                'Website',
                'Profil Perusahaan',
                'Alamat'
            ];
        }
}
