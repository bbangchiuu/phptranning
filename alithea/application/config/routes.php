<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'client/User_client';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'client/User_client/home';

$route['admin/Dashboard'] = 'admin/Dashboard';
$route['admin/list-users'] = 'admin/Dashboard/list_users';
$route['admin/list-users/delete-user/(:num)'] = 'admin/Dashboard/delete_user/$1';

$route['admin/register-admin'] = 'admin/Dashboard/register_admin';

$route['admin/list-product'] = 'admin/Dashboard_Product/list_product';
$route['admin/add-new-product'] = 'admin/Dashboard_Product/add_new_product';
$route['admin/edit_product/(:num)'] = 'admin/Dashboard_Product/edit_product/$1';
$route['admin/deleted_pro/(:num)'] = 'admin/Dashboard_Product/deleted_pro/$1';

$route['admin/list-categories'] = 'admin/Dashboard_Categories/list_categories';
$route['admin/add-new-cat'] = 'admin/Dashboard_Categories/add_new_cat';
$route['admin/edit_cat/(:num)'] = 'admin/Dashboard_Categories/edit_cat/$1';
$route['admin/detele_cat/(:num)'] = 'admin/Dashboard_Categories/detele_cat/$1';

$route['admin/orders'] = 'admin/Dashboard/orders';
$route['admin/orders/orderdetail/(:num)'] = 'admin/Dashboard/orderdetail/$1';
$route['admin/orders/delete_order/(:num)'] = 'admin/Dashboard/delete_order/$1';

$route['admin/list-customer'] = 'admin/Dashboard/list_customer';
$route['admin/delete-cus/(:num)'] = 'admin/Dashboard/delete_cus/$1';

$route['login'] = 'client/User_client/login';
$route['register'] = 'client/User_client/register';
$route['logout'] = 'client/User_client/logout';

$route['filter-product'] = 'client/Dashboard/filter_product';
$route['search-product'] = 'client/Dashboard/search_product';

$route['service'] = 'client/User_client/service';
$route['contact'] = 'client/User_client/contact';
$route['about-us'] = 'client/User_client/about_us';

$route['edit-profile'] = 'client/User_client/edit_profile';

$route['category-detail/(:num)'] = 'client/Dashboard/category_detail/$1';
$route['product-detail/(:num)'] = 'client/Dashboard/product_detail/$1';

$route['shopping-cart'] = 'client/Dashboard/shopping_cart';
$route['remove-order'] = 'client/Dashboard/remove_order';

$route['thong-tin-khach-hang'] = 'client/Dashboard/thong_tin_khach_hang';
$route['xac-nhan-don-hang'] = 'client/Dashboard/xac_nhan_don_hang';
$route['daxacnhan'] = 'client/Dashboard/daxacnhan';