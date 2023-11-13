<?php

namespace App\Exports;

use App\Models\TenantMembers;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportValidate implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // for selecting specific fields
        return TenantMembers::select('id','nik', 'full_name', 'birth_date','gender','phone','address')->get();
        // for selecting all fields
        // return ProductList::all();
    }

    public function headings(): array
        {
            //Put Here Header Name That you want in your excel sheet 
            return [
                'id',
                'NIK',
                'Nama Lengkap',
                'Tanggal Lahir',
                'Jenis Kelamin',
                'Telepon',
                'Alamat'
            ];
        }
    // public function collection()
    // {
    //     return TenantMembers::all();
    // }

    // public function headings(): array
    // {
    //     return $this->collection()->first()->toArray();
    // }
    // public function view(): View
    // {
    //     return view('admins.validation.export-excel', [
    //         'tenantmembers' => TenantMembers::all(),
    //     ]);
    // }

}
