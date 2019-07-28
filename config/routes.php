<?php
return array(

    // Single product page
    'product/([0-9]+)' => 'product/view/$1',

    // Catalog page:
    'catalog' => 'catalog/index',

    // Category pages:
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // Category pagination
    'category/([0-9]+)' => 'catalog/category/$1',

    // Cart pages:
    'cart/remove/([0-9]+)' => 'cart/remove/$1',
    'cart/checkout' => 'cart/checkout',
    'cart/getTotalPrice' => 'cart/getTotalPrice',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart' => 'cart/index',

    // User auth/register:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'profile/edit' => 'profile/edit',
    'profile' => 'profile/index',

    //  Admin -> Manage products
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',

    // Admin -> Manage categories
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    // Admin -> Manage orders
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order' => 'adminOrder/index',

    // Admin homepage
    'admin' => 'admin/index',

    // Contacts:
    'contacts' => 'site/contact',

    // About:
    // TODO: 1. Create About page
    // TODO: 2. Create Blog pages (Archive + single)

    // Homepage:
    '' => 'site/index',

);