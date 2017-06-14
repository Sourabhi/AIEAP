<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about_aieap', function () {
    return view('aieap.info.about_aieap');
});



Route::get('facilities', function () {
    return view('aieap.info.facilities');
});

Route::get('academic_english', function () {
    return view('aieap.info.academic_english');
});

Route::get('beginners', function () {
    return view('aieap.info.beginners');
});

Route::get('general_english', function () {
    return view('aieap.info.general_english');
});

Route::get('high_school', function () {
    return view('aieap.info.high_school');
});

Route::get('junior', function () {
    return view('aieap.info.junior');
});
Route::get('professional', function () {
    return view('aieap.info.professional');
});
Route::get('pronunciation_fluency', function () {
    return view('aieap.info.pronunciation_fluency');
});
Route::get('ielts', function () {
    return view('aieap.info.ielts');
});

Route::get('conditions', function () {
    return view('aieap.info.conditions');
});
Route::get('enrolment_process', function () {
    return view('aieap.info.enrolment_process');
});

Route::get('refund_cancellation', function () {
    return view('aieap.info.refund_cancellation');
});

Route::get('courses_fees', function () {
    return view('aieap.info.courses_fees');
});

/*Route::get('contact_us', function () {
    return view('aieap.info.contact_us');
});*/

/*Route::get('enrolment_form', function () {
    return view('aieap.enrolment_form');
});*/
Route::get('staff_teachers', function () {
    return view('aieap.info.staff_teachers');
});
Route::get('representatives', function () {
    return view('aieap.info.representatives');
});
Route::get('travel_trans_acco', function () {
    return view('aieap.info.travel_trans_acco');
});
Route::get('visa', function () {
    return view('aieap.info.visa');
});
Route::get('welfare', function () {
    return view('aieap..info.welfare');
});

/*Route::get('register_success', function () {
    return view('register_success');
});*/

 

Route::get ('contact_us','VisitorQueryController@create');
Route::post('contact_us','VisitorQueryController@store');



Route::get('register_confirm', 'RegisterSuccessController@index');
Route::get('enrolment_confirm', 'EnrolmentSubmitController@index');
Route::get('query_confirm', 'VisitorQuerySubmitController@index');
/*Route::get('course',['uses'=>'CoursesController@index',
    'as'=>'role',
    'middleware'=>'roles',
    'roles'=>['Admin']
    ] );*/



Route::get('enrolment_form','StudentsController@create');
Route::post('enrolment_form','StudentsController@store');






//Route::get('user_info','UsersController@index');
Route::get('register','UsersController@create');
Route::post('register','UsersController@store');
  


//Route::auth();
 //Route::get('/home', 'HomeController@index');

$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->get('logout', 'Auth\AuthController@logout');

// Registration Routes...
// $this->get('register', 'Auth\AuthController@showRegistrationForm');
// $this->post('register', 'Auth\AuthController@register');

// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');




/*Route::get('admin_dash',['uses'=>'AdminController@index',
    'as'=>'role',
    'middleware'=>'roles',
    'roles'=>['Admin']
    ] );*/

    

//Route::post('create/enrolment', 'AdminController@store');
//Route::get('create/enrolment','AdminController@create');
//Route::post('create/enrolment','AdminController@store');
//Route::get('enrolment/{id}', 'AdminController@show');
//Route::get('edit/enrolment/{id}', 'AdminController@edit');
//Route::put('edit/enrolment/{id}', 'AdminController@update');
//Route::delete('delete/enrolment/{id}', 'AdminController@destroy');

//Route::get('dashboard1', 'StudentDashController@index');


 Route::get('index', function () {
    return view('aieap.info.index');
    }); 
    
Route::group(['middleware'=>'roles:Admin'],function(){

Route::get ('restore/visitor','VisitorQuerySubmitController@create');
Route::post('restore/visitor','VisitorQuerySubmitController@store');

Route::get('edit/user/{id}', 'UsersController@edit');
Route::put('edit/user/{id}', 'UsersController@update');

Route::get('course', 'CoursesController@index');
Route::get('create/course','CoursesController@create');
Route::post('create/course','CoursesController@store');
Route::get('course/{id}', 'CoursesController@show');
Route::get('edit/course_day/{id}', 'CoursesController@edit');
Route::put('edit/course_day/{id}', 'CoursesController@update');
Route::delete('delete/course_day/{id}','CoursesController@destroy');

Route::get('admin_dash', 'AdminController@index');
Route::get('adminEnrolment','AdminController@create');
Route::post('adminEnrolment', 'AdminController@store');

Route::get('admin/user/{id}', 'AdminController@edit');
Route::put('admin/user/{id}', 'AdminController@update');
//Image Route
Route::get('image/delete/{id}','StudentsController@getImage');
Route::delete('image/delete/{id}','StudentsController@deleteImage');

Route::get('day', 'DaysController@index');
Route::get ('create/day','DaysController@create');
Route::post('create/day','DaysController@store');
Route::get('edit/day/{id}', 'DaysController@edit');
Route::get('day/{id}', 'DaysController@show');
Route::put('edit/day/{id}', 'DaysController@update');
Route::delete('delete/day/{id}','DaysController@destroy');

Route::get('timeslot', 'TimeSlotsController@index');
Route::get ('create/timeslot','TimeSlotsController@create');
Route::post('create/timeslot','TimeSlotsController@store');
Route::get('timeslot/{id}', 'TimeSlotsController@show');
Route::get('edit/timeslot/{id}', 'TimeSlotsController@edit');
Route::put('edit/timeslot/{id}', 'TimeSlotsController@update');
Route::delete('delete/timeslot/{id}','TimeSlotsController@destroy');

Route::get('role','RolesController@index');
Route::get('create/role', 'RolesController@create');
Route::post('create/role', 'RolesController@store');
Route::get('role/{id}', 'RolesController@show');
Route::get('edit/role/{id}', 'RolesController@edit');
Route::put('edit/role/{id}', 'RolesController@update');
Route::delete('delete/role/{id}', 'RolesController@destroy');

Route::get('user_info','UsersController@index');
Route::get('user/{id}', 'UsersController@show');  

Route::get('student_dash', 'StudentsController@index');
Route::get('student/{id}', 'StudentsController@show');
Route::get('edit/student/{id}', 'StudentsController@edit');
Route::put('edit/student/{id}', 'StudentsController@update');
Route::delete('delete/student/{id}', 'StudentsController@destroy');

Route::get('visitor', 'VisitorQueryController@index');
Route::get('visitor/{id}', 'VisitorQueryController@show');
Route::get('edit/query/{id}', 'VisitorQueryController@edit');
Route::put('edit/query/{id}', 'VisitorQueryController@update');
Route::delete('delete/query/{id}','VisitorQueryController@destroy');

});





