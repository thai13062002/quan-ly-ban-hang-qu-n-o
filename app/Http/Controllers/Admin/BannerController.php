<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\BannerRequest;
use App\Http\Requests\Admin\Banner\UpdateBannerRequest;
use App\Models\Banner;
use App\Services\Admin\BannerService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.banner.title'));
        $data['banners'] = BannerService::getInstance()->getListBanners();

        return view('admin.banners.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.banner.title'));

        return view('admin.banners.create')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(BannerRequest $request)
    {
        BannerService::getInstance()->create($request->only(['image', 'title', 'link']));
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.banner.title'));
        toastr(trans('admin.response.create', ['name' => trans('admin.label.banner.name')]));

        return redirect(route('admin.banners.index'))->with(['data', $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.banner.title'));
        $data['banner'] = BannerService::getInstance()->edit($id);

        return view('admin.banners.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateBannerRequest $request, $id)
    {
        BannerService::getInstance()->update($id,  $request->only(['image', 'title', 'link', 'status']));
        toastr(trans('admin.response.update', ['name' => trans('admin.label.banner.name')]));

        return redirect(route('admin.banners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        BannerService::getInstance()->delete($id);
        toastr(trans('admin.response.delete', ['name' => trans('admin.label.banner.name')]));

        return redirect(route('admin.banners.index'));
    }
}
