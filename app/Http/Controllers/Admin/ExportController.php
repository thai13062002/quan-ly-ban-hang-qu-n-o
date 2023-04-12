<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CustomerExport;
use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    /**
     * Export file excell
     *
     * @return \Illuminate\Http\Response
     */
    public function exportCustomer()
    {
        return Excel::download(new CustomerExport(), trans('admin.label.customer.title') . '.xlsx');
    }

    /**
     * Export file excell
     *
     * @return \Illuminate\Http\Response
     */
    public function exportOrder()
    {
        return Excel::download(new OrderExport(), trans('admin.label.order.title') . '.xlsx');
    }
}
