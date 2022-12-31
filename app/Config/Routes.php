<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/logout', 'LoginController::logout');
$routes->match(['get', 'post'], '/login', 'LoginController::index');

$routes->group('admin', ['filter' => 'authGuard'], function($routes)
{
    $routes->get('dashboard', 'DashboardController::index');
    $routes->match(['get', 'post'], 'profile', 'DashboardController::profile');
});

$routes->group('system', ['filter' => 'authGuard'], function($routes)
{
    $routes->match(['get', 'post'], 'setting', 'SystemController::index');

});

// enquiry-category router here....
$routes->group('academic', ['filter' => 'authGuard'], function($routes)
{
    $routes->group('inqCategory', function($routes)
    {
        $routes->get('/', 'EnquiryCategoryController::show');
        $routes->match(['get', 'post'],'create', 'EnquiryCategoryController::showCategoryForm');
        $routes->get('edit/(:num)', 'EnquiryCategoryController::singleCategory/$1');
        $routes->post('update', 'EnquiryCategoryController::updateCategory');
        $routes->get('delete/(:num)', 'EnquiryCategoryController::deleteCategory/$1');
    });

    // enquiry router here....
    $routes->group('enquiry', function($routes)
    {
        $routes->get('/', 'EnquiryController::index');
        $routes->get('delete/(:num)', 'EnquiryController::deleteEnquiry/$1');
    });

    // clubs router here....
    $routes->group('club', function($routes)
    {
        $routes->get('/', 'ClubController::show');
        $routes->post('save', 'ClubController::insertClub');
        $routes->get('edit/(:num)', 'ClubController::editClub/$1');
        $routes->post('update/(:num)', 'ClubController::updateClub/$1');
        $routes->get('delete/(:num)', 'ClubController::deleteClub/$1');
    });

    //circular router...
    $routes->group('circular', function($routes)
    {
        $routes->get('/', 'CircularController::show');
        $routes->get('add', 'CircularController::showCircularForm');
        $routes->post('save', 'CircularController::insertCircular');
        $routes->get('edit/(:num)', 'CircularController::editCircular/$1');
        $routes->post('update/(:num)', 'CircularController::updateCircular/$1');
        $routes->get('delete/(:num)', 'CircularController::deleteCircular/$1');
    });
});

//parent menu routes................
$routes->group('parent', ['filter' => 'authGuard'], function($routes)
{
    $routes->get('/', 'ParentController::show');
    $routes->get('add', 'ParentController::showParentForm');
    $routes->post('save', 'ParentController::insertParent');
    $routes->get('edit/(:num)', 'ParentController::editParent/$1');
    $routes->post('update/(:num)', 'ParentController::updateParent/$1');
    $routes->get('delete/(:num)', 'ParentController::deleteParent/$1');
});

//employee menu routes.................
$routes->group('employee', ['filter' => 'authGuard'], function($routes)
{
    $routes->group('librarian', function($routes)  //librarian submenu routes....
    {
        $routes->get('/', 'LibraryController::show');
        $routes->get('add', 'LibraryController::showLibrarianForm');
        $routes->post('save', 'LibraryController::insertLibrarian');
        $routes->get('edit/(:num)', 'LibraryController::editLibrarian/$1');
        $routes->post('update/(:num)', 'LibraryController::updateLibrarian/$1');
        $routes->get('delete/(:num)', 'LibraryController::deleteLibrarian/$1');
    });

    $routes->group('accountant', function($routes)   //accountant submenu routes....
    {
        $routes->get('/', 'AccountantController::show');
        $routes->get('add', 'AccountantController::showAccountantForm');
        $routes->post('save', 'AccountantController::insertAccountant');
        $routes->get('edit/(:num)', 'AccountantController::editAccountant/$1');
        $routes->post('update/(:num)', 'AccountantController::updateAccountant/$1');
        $routes->get('delete/(:num)', 'AccountantController::deleteAccountant/$1');
    });

    $routes->group('hostel', function($routes)     //hostel submenu routes....
    {
        $routes->get('/', 'HostelController::show');
        $routes->get('add', 'HostelController::showHostelForm');
        $routes->post('save', 'HostelController::insertHostel');
        $routes->get('edit/(:num)', 'HostelController::editHostel/$1');
        $routes->post('update/(:num)', 'HostelController::updateHostel/$1');
        $routes->get('delete/(:num)', 'HostelController::deleteHostel/$1');
    });

    $routes->group('hrm', function($routes)     //hrm submenu routes....
    {
        $routes->get('/', 'HrmController::show');
        $routes->get('add', 'HrmController::showHrmForm');
        $routes->post('save', 'HrmController::insertHrm');
        $routes->get('edit/(:num)', 'HrmController::editHrm/$1');
        $routes->post('update/(:num)', 'HrmController::updateHrm/$1');
        $routes->get('delete/(:num)', 'HrmController::deleteHrm/$1');
    });
});

//alumni menu routes....
$routes->group('alumni', ['filter' => 'authGuard'], function($routes)
{
    $routes->get('/', 'AlumniController::show');
    $routes->get('add', 'AlumniController::showAlumniForm');
    $routes->post('save', 'AlumniController::insertAlumni');
    $routes->get('edit/(:num)', 'AlumniController::editAlumni/$1');
    $routes->post('update/(:num)', 'AlumniController::updateAlumni/$1');
    $routes->get('delete/(:num)', 'AlumniController::deleteAlumni/$1');
});

//expenses menu routes....
$routes->group('expenses', ['filter' => 'authGuard'], function($routes)
{
    $routes->group('category', function($routes)    //category submenu routes....
    {
        $routes->get('/', 'ExpenseCategoryController::show');
        $routes->post('save', 'ExpenseCategoryController::insertExpCategory');
        $routes->get('edit/(:num)', 'ExpenseCategoryController::editExpCategory/$1');
        $routes->post('update/(:num)', 'ExpenseCategoryController::updateExpCategory/$1');
        $routes->get('delete/(:num)', 'ExpenseCategoryController::deleteExpCategory/$1');
    });

    $routes->group('expense', function($routes)     //expense submenu routes....
    {
        $routes->get('/', 'ExpenseController::show');
        $routes->get('add', 'ExpenseController::showExpenseForm');
        $routes->post('save', 'ExpenseController::insertExpense');
        $routes->get('edit/(:num)', 'ExpenseController::editExpense/$1');
        $routes->post('update/(:num)', 'ExpenseController::updateExpense/$1');
        $routes->get('delete/(:num)', 'ExpenseController::deleteExpense/$1');
    });
});

//hr menu routes....
$routes->group('hr', ['filter' => 'authGuard'], function($routes)
{
    $routes->group('department', function($routes)     //department submenu routes....
    {
        $routes->get('/', 'DepartmentController::show');
        $routes->post('save', 'DepartmentController::insertDepartment');
        $routes->get('edit/(:num)', 'DepartmentController::editDepartment/$1');
        $routes->post('update/(:num)', 'DepartmentController::updateDepartment/$1');
        $routes->get('delete/(:num)', 'DepartmentController::deleteDepartment/$1');
    });

    $routes->group('teacher', function($routes)     //teacher submenu routes....
    {
        $routes->get('/', 'TeacherController::show');
        $routes->get('add', 'TeacherController::showTeacherForm');
        $routes->post('save', 'TeacherController::insertTeacher');
        $routes->get('edit/(:num)', 'TeacherController::editTeacher/$1');
        $routes->post('update/(:num)', 'TeacherController::updateTeacher/$1');
        $routes->get('delete/(:num)', 'TeacherController::deleteTeacher/$1');
    });
});



//call ajax request routes............
$routes->group('ajax', ['filter' => 'authGuard'], function($routes)     //teacher submenu routes....
    {
        $routes->get('get_designation/(:num)', 'DepartmentController::get_designation/$1');
    });

$routes->get('/api', 'RestController::index');
$routes->post('/create', 'RestController::create');
$routes->get('/show/(:num)', 'RestController::show/$1');

/*
 * --------------------------------------------------------------------
 * Additional RoutingEnquiryCategoryController
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
