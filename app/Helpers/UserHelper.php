<?php

namespace App\Helpers;

use App\Services\User\CategoryService;

class UserHelper
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
        }//end if

        return $title . ' - ' . config('app.name');
    }


    /**
     * Get user sidebar
     *
     * @return array
     */
    public static function getUserMenu(): array
    {
        return [
            [
                'label' => trans('user.sidebar.home'),
                'route' => 'user.home',
            ],
            [
                'label' => trans('user.sidebar.product'),
                'route' => 'user.shop.index',
            ],
            [
                'label' => trans('user.sidebar.category'),
                'items' => CategoryService::getInstance()->getListCategories()
            ],
            [
                'label' => trans('user.sidebar.contact'),
                'route' => 'user.contact',
            ],
            [
                'label' => trans('user.sidebar.about'),
                'route' => 'user.about',
            ],
        ];
    }

    public static function getBenefits(): array
    {
        return [
            [
                'label' => trans('user.benefit.ship'),
                'image' => 'user-assets/imgs/theme/icons/feature-1.png'
            ],
            [
                'label' => trans('user.benefit.online'),
                'image' => 'user-assets/imgs/theme/icons/feature-2.png'
            ],
            [
                'label' => trans('user.benefit.save'),
                'image' => 'user-assets/imgs/theme/icons/feature-3.png'
            ],
            [
                'label' => trans('user.benefit.promotions'),
                'image' => 'user-assets/imgs/theme/icons/feature-4.png'
            ],
            [
                'label' => trans('user.benefit.happy'),
                'image' => 'user-assets/imgs/theme/icons/feature-5.png'
            ],
            [
                'label' => trans('user.benefit.support'),
                'image' => 'user-assets/imgs/theme/icons/feature-6.png'
            ],
        ];
    }

    public static function getBrands(): array
    {
        return [
            [
                'image' => 'user-assets/imgs/banner/brand-1.png'
            ],
            [
                'image' => 'user-assets/imgs/banner/brand-2.png'
            ],
            [
                'image' => 'user-assets/imgs/banner/brand-3.png'
            ],
            [
                'image' => 'user-assets/imgs/banner/brand-4.png'
            ],
            [
                'image' => 'user-assets/imgs/banner/brand-5.png'
            ],
            [
                'image' => 'user-assets/imgs/banner/brand-6.png'
            ],
            [
                'image' => 'user-assets/imgs/banner/brand-2.png'
            ],
            [
                'image' => 'user-assets/imgs/banner/brand-3.png'
            ],
        ];
    }
}
