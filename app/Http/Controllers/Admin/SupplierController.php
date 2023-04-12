<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Supplier\SupplierRequest;
use App\Http\Requests\Admin\Supplier\UpdateSupplierRequest;
use App\Services\Admin\SupplierService;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.supplier.title'));
        $data['suppliers'] = SupplierService::getInstance()->getListSuppliers();
        
        return view('admin.suppliers.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.supplier.title'));

        return view('admin.suppliers.create')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        SupplierService::getInstance()->create($request->only(['name', 'phone', 'email', 'address']));
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.supplier.title'));
        toastr(trans('admin.response.create', ['name' => trans('admin.label.supplier.name')]));

        return redirect(route('admin.suppliers.index'))->with(['data', $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.supplier.title'));
        $supplier = SupplierService::getInstance()->edit($id);
        $data['supplier'] = $supplier;

        return view('admin.suppliers.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, $id)
    {
        SupplierService::getInstance()->update($id,  $request->only(['name', 'phone', 'email', 'address', 'status']));
        toastr(trans('admin.response.update', ['name' => trans('admin.label.supplier.title')]));

        return redirect(route('admin.suppliers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SupplierService::getInstance()->delete($id);
        toastr(trans('admin.response.delete', ['name' => trans('admin.label.supplier.title')]));

        return redirect(route('admin.suppliers.index'));
    }
}
