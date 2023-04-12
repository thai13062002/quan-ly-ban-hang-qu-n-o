<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CategoryService extends Service
{
    /**
     * Get List Category in select option
     *
     * @return Builder[]|Collection
     */
    public function getCategoryOption(): Collection|array
    {
        return Category::query()
            ->select(['id', 'name',  'status', 'parent_id'])
            ->get();
    }

    /**
     * Get List Category in select option
     *
     * @return Builder[]|Collection
     */
    public function getCategoryOptionEdit($id): Collection|array
    {
        return Category::query()
            ->select(['id', 'name',  'status', 'parent_id'])
            ->where('id', '!=', $id)
            ->get()->toArray();
    }

    /**
     * Get List Category
     *
     * @return Builder[]|Collection
     */
    public function getListCategories(): Collection|array
    {
        return Category::query()
            ->select(['id', 'name',  'status', 'parent_id'])
            ->with('parent')
            ->get()->toArray();
    }


    /**
     * Store
     *
     * @param $data
     */
    public function store($data)
    {
        Category::query()->create(['name' => $data['name_category'], 'parent_id' => $data['parent_id']]);
    }

    /**
     * Name Category Parent
     *
     * @param $id
     */
    public function nameCategoryParent($id)
    {
        $category = Category::query()
            ->select(['id', 'name'])
            ->where('id', $id)
            ->first();
        if (!$category) {
            abort(404);
        } //end if

        return $category;
    }

    /**
     * Show Category
     *
     * @param $id
     */
    public function show($id)
    {
        $category = Category::query()
            ->select(['id', 'name',  'status'])
            ->where('parent_id', $id)
            ->get();
        if (!$category) {
            abort(404);
        } //end if

        return $category;
    }

    /**
     * Show form edit
     *
     * @param $id
     */
    public function edit($id)
    {
        $category = Category::query()
            ->select(['id', 'name', 'parent_id'])
            ->where('id', $id)
            ->first();
        if (!$category) {
            abort(404);
        } //end if

        return $category;
    }

    /**
     * Show form edit
     *
     * @param $id
     */
    public function update($id, $data)
    {
        $category = Category::find($id);
        if (!$category) {
            abort(404);
        } //end if
        $category->update(['name' => $data['name_category'], 'parent_id' => $data['parent_id']]);
    }
    /**
     * Delete
     *
     * @param $id
     */
    public function delete($id)
    {
        $category = Category::query()->where('id', $id)->first();
        if (!$category) {
            abort(404);
        } //end if

        $category->delete();
    }
}
