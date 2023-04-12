<?php

namespace App\Helpers;

class AdminHelper
{
    /**
     *  Get page title
     *
     * @param null $title
     * @return string|null
     */
    public static function getPageTitle($title = null): ?string
    {
        if (!$title) {
            return config('app.name');
        } //end if

        return $title . ' - ' . config('app.name');
    }

    /**
     * Get admin sidebar
     *
     * @return array
     */
    public static function getAdminSidebar(): array
    {
        return [
            [
                'label' => trans('admin.sidebar.dashboard'),
                'icon' => 'bx bx-home-circle',
                'route' => 'dashboard',
            ],
            [
                'label' => trans('admin.sidebar.product'),
                'icon' => 'bx bx-closet',
                'items' => [
                    [
                        'label' => trans('admin.action.list'),
                        'route' => 'products.index',
                    ],
                    [
                        'label' => trans('admin.action.create'),
                        'route' => 'products.create',
                    ],
                ],
            ],
            [
                'label' => trans('admin.sidebar.category'),
                'icon' => 'bx bx-file',
                'items' => [
                    [
                        'label' => trans('admin.action.list'),
                        'route' => 'categories.index',
                    ],
                    [
                        'label' => trans('admin.action.create'),
                        'route' => 'categories.create',
                    ],
                ],
            ],
            [
                'label' => trans('admin.sidebar.supplier'),
                'icon' => 'bx bx-home',
                'items' => [
                    [
                        'label' => trans('admin.action.list'),
                        'route' => 'suppliers.index',
                    ],
                    [
                        'label' => trans('admin.action.create'),
                        'route' => 'suppliers.create',
                    ],
                ],
            ],
            [
                'label' => trans('admin.sidebar.banner'),
                'icon' => 'bx bx-rocket',
                'items' => [
                    [
                        'label' => trans('admin.action.list'),
                        'route' => 'banners.index',
                    ],
                    [
                        'label' => trans('admin.action.create'),
                        'route' => 'banners.create',
                    ],
                ],
            ],
            [
                'label' => trans('admin.sidebar.newsletter'),
                'icon' => 'bx bx-wallet',
                'items' => [
                    [
                        'label' => trans('admin.action.list'),
                        'route' => 'newsletter.index',
                    ],
                    [
                        'label' => trans('admin.action.create'),
                        'route' => 'newsletter.create',
                    ],
                    [
                        'label' => trans('admin.action.history'),
                        'route' => 'newsletter.history',
                    ],
                ],
            ],
            [
                'label' => trans('admin.sidebar.order'),
                'icon' => 'bx bx-basket',
                'route' => 'orders.index',
            ],
            [
                'label' => trans('admin.sidebar.customer'),
                'icon' => 'bx bx-user',
                'route' => 'customers.index',
            ],
            [
                'label' => trans('admin.sidebar.contact'),
                'icon' => 'bx bx-user-voice',
                'route' => 'contacts.index',
            ],
        ];
    }
}
