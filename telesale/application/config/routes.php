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
$route['default_controller'] = 'client/UsersClient/changeroute';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'client/UsersClient';
//$route['home?trang=([0-9\-]+).html'] = 'client/UsersClient';

// $route['([0-9\-]+)'] = "client/UsersClient/index/$1";

$route['index.html'] = 'admin/DashboardAdmin';
$route['dashboard.html'] = 'admin/DashboardAdmin/dashboards';
$route['mail.html'] = 'admin/DashboardAdmin/mails';
$route['layout_app.html'] = 'admin/DashboardAdmin/layout_app';
$route['layout_fullwidth.html'] = 'admin/DashboardAdmin/layout_fullwidth';
$route['layout_boxed.html'] = 'admin/DashboardAdmin/layout_boxed';
$route['ui_button.html'] = 'admin/DashboardAdmin/ui_button';
$route['ui_icon.html'] = 'admin/DashboardAdmin/ui_icon';
$route['ui_grid.html'] = 'admin/DashboardAdmin/ui_grid';
$route['ui_widget.html'] = 'admin/DashboardAdmin/ui_widget';
$route['ui_sortable.html'] = 'admin/DashboardAdmin/ui_sortable';
$route['ui_portlet.html'] = 'admin/DashboardAdmin/ui_portlet';
$route['ui_timeline.html'] = 'admin/DashboardAdmin/ui_timeline';
$route['ui_jvectormap.html'] = 'admin/DashboardAdmin/ui_jvectormap';

$route['table_static.html'] = 'admin/DashboardAdmin/table_static';
$route['table_static.html/([0-9\-]+)'] = "admin/DashboardAdmin/table_static/$1";

$route['table_static_search.html'] = 'admin/DashboardAdmin/table_static_search';
$route['table_static_search.html/([0-9\-]+)'] = "admin/DashboardAdmin/table_static_search/$1";

$route['table_datatable.html'] = 'admin/DashboardAdmin/table_datatable';
$route['table_footable.html'] = 'admin/DashboardAdmin/table_footable';
$route['form_element.html'] = 'admin/DashboardAdmin/form_element';
$route['ui_chart.html'] = 'admin/DashboardAdmin/ui_chart';
$route['page_profile.html'] = 'admin/DashboardAdmin/page_profile';

$route['page_post.html'] = 'admin/DashboardAdmin/page_post';
$route['page_post.html/([0-9\-]+)'] = 'admin/DashboardAdmin/page_post/$1';

$route['page_search.html'] = 'admin/DashboardAdmin/page_search';
$route['page_invoice.html'] = 'admin/DashboardAdmin/page_invoice';
$route['page_price.html'] = 'admin/DashboardAdmin/page_price';
$route['page_lockme.html'] = 'admin/DashboardAdmin/page_lockme';

$route['page_forgotpwd.html'] = 'admin/DashboardAdmin/page_forgotpwd';
$route['page_404.html'] = 'admin/DashboardAdmin/page_404';

$route['page_signup_Admin.html'] = 'admin/UsersAdmin/page_signup';

$route['page_signin.html'] = 'client/UsersClient/page_signin';
$route['page_signup.html'] = 'client/UsersClient/page_signup';
$route['logout.html'] = 'admin/UsersAdmin/logOut';

$route['editUser.html'] = 'client/UsersClient/editUser';

$route['editBaiviet.html/([0-9\-]+)/([0-9\-]+)'] = 'admin/DashboardAdmin/editBaiviet/$1/$1';
$route['xoaBaiviet.html/([0-9\-]+)'] = 'admin/DashboardAdmin/xoaBaiviet/$1';

$route['detailBaiviet/([0-9\-]+)'] = 'client/UsersClient/detailBaiviet/$1';
$route['category/([0-9\-]+)'] = 'client/UsersClient/baivietCategory/$1';