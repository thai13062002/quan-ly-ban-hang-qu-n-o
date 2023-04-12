<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CustomerExport implements FromCollection, WithMapping, WithHeadings,ShouldAutoSize,WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('id', 'name', 'email')
        ->with(['userAddress','userAddress.ward','userAddress.district','userAddress.province'])
        ->get();
    }

    /**
     * Data row
     *
     * @return DataRow
     */

    public function map($row): array
    {
        return [
            $row->name,
            $row->userAddress->phone ? $row->userAddress->phone:'',
            $row->email,
            implode(', ', [$row->userAddress->ward->name ? $row->userAddress->ward->name:"", $row->userAddress->district->name ?$row->userAddress->district->name:"", $row->userAddress->province->name? $row->userAddress->province->name:""])

        ];
    }

    /**
     * List Heading
     *
     * @return ListHeading
     */

    public function headings(): array
    {
        return [
            trans('admin.label.customer.name'),
            trans('admin.label.phone'),
            trans('admin.label.email'),
            trans('admin.label.address'),
        ];
    }

    /**
     * Style sheet
     *
     * @return StyleSheet
     */

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
