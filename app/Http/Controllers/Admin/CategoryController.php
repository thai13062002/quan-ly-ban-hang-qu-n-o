<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Helpers\DataHelper;
use App\Http\Controllers\Controller;
use App\Services\Admin\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\categories\CategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.category.title'));
        $data['categories'] = CategoryService::getInstance()->getListCategories();

        return view('admin.categories.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.category.title'));
        $data['categories'] = CategoryService::getInstance()->getListCategories();
        $data['categories_option'] = CategoryService::getInstance()->getCategoryOption();

        return view('admin.categories.create')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->only(['name_category', 'parent_id']);

        CategoryService::getInstance()->store($data);
        toastr(trans('admin.response.create', ['name' => trans('admin.label.category.name')]));

        return redirect()->route('admin.categories.index');
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
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.category.title'));
        $data['category'] = CategoryService::getInstance()->edit($id);
        $data['categories_option'] = CategoryService::getInstance()->getCategoryOptionEdit($id);

        return view('admin.categories.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['name_category', 'parent_id']);
        CategoryService::getInstance()->update($id,$data);
        toastr(trans('admin.response.update', ['name' => trans('admin.label.category.name')]));

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        CategoryService::getInstance()->delete($id);
        toastr(trans('admin.response.delete', ['name' => trans('admin.label.category.name')]));

        return redirect()->back();
    }
}
