<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrderExport implements FromCollection, WithMapping, WithHeadings,ShouldAutoSize,WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Order::query()
            ->with(['user', 'user.userAddress.ward', 'user.userAddress.district', 'user.userAddress.province'])
            ->select(['id', 'user_id', 'payment', 'total'])
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
            $row->id,
            $row->user->name,
            date('d-m-Y', strtotime($row->created_at)),
            number_format($row->total),
            implode(', ', [$row->user->userAddress->ward->name, $row->user->userAddress->district->name, $row->user->userAddress->province->name]),
            $row->payment == 1 ? __('admin.label.order.online')  : __('admin.label.order.cod')
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
            trans('admin.label.order.id'),
            trans('admin.label.order.customer'),
            trans('admin.label.order.date'),
            trans('admin.label.total'),
            trans('admin.label.address'),
            trans('admin.label.payment')
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
