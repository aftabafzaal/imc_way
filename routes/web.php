<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

//~ Route::get('/', function () {
//~ return view('welcome');
//~ });

Auth::routes();

Route::post('infromationsave', 'ClinicController@infromationsave');
Route::post('inforesultsave', 'ClinicController@inforesultsave');
Route::post('infermedica', 'GpController@infermedica');
Route::post('saveitem', 'ClinicController@saveitem');
Route::post('getitem', 'ClinicController@getitem');


Route::group(['middleware' => ['cors']], function () {
    Route::post('infromationsave', 'ClinicController@infromationsave');
    Route::post('inforesultsave', 'ClinicController@inforesultsave');
    Route::post('infermedica', 'GpController@infermedica');
    Route::post('saveitem', 'ClinicController@saveitem');
    Route::post('getitem', 'ClinicController@getitem');
});
Route::get('permission', 'GpController@dashboard');



Route::namespace('ADMIN')->group(function () {

    Route::post('users/forgot-password', 'UserController@forgotPassword');
    Route::get('users/reset-password/{token}', 'UserController@resetPassword');
    Route::post('users/reset-password-submit', 'UserController@resetPasswordSubmit');
    Route::post('getpage', 'PageController@getpage');
    Route::get('/getmedia', 'MediaController@getmedia');
});


Route::group(['middleware' => ['auth']], function () {
    Route::namespace('ADMIN')->prefix('admin')->group(function () {


        Route::post('doctors/update-multi-users-status', 'DoctorsController@updateMultiUserStatus');
        Route::post('doctors/delete-single-user', 'DoctorsController@deleteSingleUser');
        Route::post('doctors/update-multi-users-status', 'DoctorsController@updateMultiUserStatus');


        Route::get('doctors/manage', 'DoctorsController@manage');
        Route::post('doctors/manage', 'DoctorsController@manage');

        //Academy Library routes
        Route::get('privacy/edit/{id?}', 'PrivacyController@edit');
        Route::get('privacy/section', 'PrivacyController@section');
        Route::post('privacy/getSectionContent', 'PrivacyController@getSectionContent');
        Route::post('privacy/updateSectionContent', 'PrivacyController@updateSectionContent');
        Route::post('privacy/deleteMultiple', 'PrivacyController@deleteMultiple');
        Route::resource('privacy', 'PrivacyController');

        Route::get('term/edit/{id?}', 'TermController@edit');
        Route::get('term/section', 'TermController@section');
        Route::post('term/getSectionContent', 'TermController@getSectionContent');
        Route::post('term/updateSectionContent', 'TermController@updateSectionContent');
        Route::post('term/deleteMultiple', 'TermController@deleteMultiple');
        Route::resource('term', 'TermController');

        Route::get('about/edit/{id?}', 'AboutController@edit');
        Route::get('about/section', 'AboutController@section');
        Route::post('about/getSectionContent', 'AboutController@getSectionContent');
        Route::post('about/updateSectionContent', 'AboutController@updateSectionContent');
        Route::post('about/deleteMultiple', 'AboutController@deleteMultiple');
        Route::resource('about', 'AboutController');


        Route::get('doctor/section', 'DoctorController@section');
        Route::post('doctor/getSectionContent', 'DoctorController@getSectionContent');
        Route::post('doctor/updateSectionContent', 'DoctorController@updateSectionContent');
        Route::post('doctor/deleteMultiple', 'DoctorController@deleteMultiple');
        Route::resource('doctor', 'DoctorController');


        Route::get('department/section', 'DepartmentController@section');
        Route::post('department/getSectionContent', 'DepartmentController@getSectionContent');
        Route::post('department/updateSectionContent', 'DepartmentController@updateSectionContent');
        Route::post('department/deleteMultiple', 'DepartmentController@deleteMultiple');
        Route::resource('department', 'DepartmentController');

        Route::post('media/deleteMultiple', 'MediaController@deleteMultiple');
        Route::post('media/upload', 'MediaController@upload');
        Route::resource('media', 'MediaController');


        Route::get('mayo/section', 'MayoController@section');
        Route::post('mayo/getSectionContent', 'MayoController@getSectionContent');
        Route::post('mayo/updateSectionContent', 'MayoController@updateSectionContent');
        Route::post('mayo/deleteMultiple', 'MayoController@deleteMultiple');
        Route::resource('mayo', 'MayoController');

        Route::get('pages/section', 'UserController@section');
        Route::post('pages/getSectionContent', 'UserController@getSectionContent');
        Route::post('pages/updateSectionContent', 'UserController@updateSectionContent');
        Route::post('pages/deleteMultiple', 'UserController@deleteMultiple');


        Route::resource('rightbar', 'RightbarController');
        Route::post('rightbar/updateSectionContent', 'RightbarController@updateSectionContent');
        Route::post('rightbar/getSectionContent', 'RightbarController@getSectionContent');
        // right side bar links
        Route::get('finddoctorbottom', 'RightbarController@finddoctorbottom');
        Route::post('finddoctorbottom/updateSectionContent', 'RightbarController@updatefinddoctorbottom');


        Route::get('carrers/section', 'CarrersController@section');
        Route::post('carrers/getSectionContent', 'CarrersController@getSectionContent');
        Route::post('carrers/updateSectionContent', 'CarrersController@updateSectionContent');
        Route::post('carrers/deleteMultiple', 'CarrersController@deleteMultiple');
        Route::resource('carrers', 'CarrersController');



        //testimonies routes
        Route::get('testimonies/section', 'TestimoniesController@section');
        Route::post('testimonies/getSectionContent', 'TestimoniesController@getSectionContent');
        Route::post('testimonies/updateSectionContent', 'TestimoniesController@updateSectionContent');
        Route::resource('testimonies', 'TestimoniesController');

        //Appointment routes

        Route::get('appointment/section', 'AppointmentController@section');
        Route::post('appointment/getSectionContent', 'AppointmentController@getSectionContent');
        Route::post('appointment/updateSectionContent', 'AppointmentController@updateSectionContent');
        Route::post('appointment/deleteMultiple', 'AppointmentController@deleteMultiple');
        Route::resource('appointment', 'AppointmentController');

        //Visitor routes

        Route::get('visitor/section', 'VisitorController@section');
        Route::post('visitor/getSectionContent', 'VisitorController@getSectionContent');
        Route::post('visitor/updateSectionContent', 'VisitorController@updateSectionContent');
        Route::post('visitor/deleteMultiple', 'VisitorController@deleteMultiple');
        Route::resource('visitor', 'VisitorController');

        //Patient rights routes

        Route::get('patientright/section', 'PatientrightController@section');
        Route::post('patientright/getSectionContent', 'PatientrightController@getSectionContent');
        Route::post('patientright/updateSectionContent', 'PatientrightController@updateSectionContent');
        Route::post('patientright/deleteMultiple', 'PatientrightController@deleteMultiple');
        Route::resource('patientright', 'PatientrightController');

        //Benefit routes

        Route::get('benefit/section', 'BenefitsController@section');
        Route::post('benefit/getSectionContent', 'BenefitsController@getSectionContent');
        Route::post('benefit/updateSectionContent', 'BenefitsController@updateSectionContent');
        Route::post('benefit/deleteMultiple', 'BenefitsController@deleteMultiple');
        Route::resource('benefit', 'BenefitsController');

        //Staying IMC routes

        Route::get('stayingimc/section', 'StayingImcController@section');
        Route::post('stayingimc/getSectionContent', 'StayingImcController@getSectionContent');
        Route::post('stayingimc/updateSectionContent', 'StayingImcController@updateSectionContent');
        Route::post('stayingimc/deleteMultiple', 'StayingImcController@deleteMultiple');
        Route::resource('stayingimc', 'StayingImcController');

        //Patients Library routes

        Route::get('patientlibrary/section', 'PatientLibraryController@section');
        Route::post('patientlibrary/getSectionContent', 'PatientLibraryController@getSectionContent');
        Route::post('patientlibrary/updateSectionContent', 'PatientLibraryController@updateSectionContent');
        Route::post('patientlibrary/deleteMultiple', 'PatientLibraryController@deleteMultiple');
        Route::resource('patientlibrary', 'PatientLibraryController');

        //Patients Library Category routes

        Route::get('patientlibrarycategory/section', 'PatientLibraryCategoryController@section');
        Route::post('patientlibrarycategory/getSectionContent', 'PatientLibraryCategoryController@getSectionContent');
        Route::post('patientlibrarycategory/updateSectionContent', 'PatientLibraryCategoryController@updateSectionContent');
        Route::post('patientlibrarycategory/deleteMultiple', 'PatientLibraryCategoryController@deleteMultiple');
        Route::resource('patientlibrarycategory', 'PatientLibraryCategoryController');

        //Location routes

        Route::get('location', 'LocationController@index');
        Route::post('location/getSectionContent', 'LocationController@getSectionContent');
        Route::post('location/updateSectionContent', 'LocationController@updateSectionContent');

        //Academy Library routes

        Route::get('academy/section', 'AcademyController@section');
        Route::post('academy/getSectionContent', 'AcademyController@getSectionContent');
        Route::post('academy/updateSectionContent', 'AcademyController@updateSectionContent');
        Route::post('academy/deleteMultiple', 'AcademyController@deleteMultiple');
        Route::resource('academy', 'AcademyController');

        //Survey Library routes

        Route::get('survey/section', 'SurveyController@section');
        Route::post('survey/getSectionContent', 'SurveyController@getSectionContent');
        Route::post('survey/updateSectionContent', 'SurveyController@updateSectionContent');
        Route::post('survey/deleteMultiple', 'SurveyController@deleteMultiple');
        Route::resource('survey', 'SurveyController');

        Route::get('residence/section', 'ResidencesController@section');
        Route::post('residence/getSectionContent', 'ResidencesController@getSectionContent');
        Route::post('residence/updateSectionContent', 'ResidencesController@updateSectionContent');
        Route::post('residence/deleteMultiple', 'ResidencesController@deleteMultiple');
        Route::resource('residence', 'ResidencesController');

        //Doctors

        Route::post('doctors/convertData', 'DoctorsController@convertData');
        Route::resource('doctors', 'DoctorsController');

        //Departments

        Route::post('departments/convertData', 'DepartmentsController@convertData');
        Route::resource('departments', 'DepartmentsController');


        // @ jay routes end

        Route::get('dashboard', 'UserController@dashboard');

        Route::get('topmenu/list/{id?}', 'ComponentController@topmenu_list');
        Route::post('topmenu/create', 'ComponentController@topmenu_create');
        Route::post('topmenu/delete', 'ComponentController@topmenu_delete');
        Route::post('topmenu/update-menu-order', 'ComponentController@updateTopmenuOrder');

        Route::get('middlemenu/list/{id?}', 'ComponentController@middlemenu_list');
        Route::post('middlemenu/create', 'ComponentController@middlemenu_create');
        Route::post('middlemenu/delete', 'ComponentController@middlemenu_delete');
        Route::post('middlemenu/update-menu-order', 'ComponentController@updateMiddlemenuOrder');

        Route::get('mainmenu/list/{id?}/{type?}/{submenuid?}', 'ComponentController@mainmenu_list');
        Route::post('mainmenu/create', 'ComponentController@mainmenu_create');
        Route::post('mainmenu/delete', 'ComponentController@mainmenu_delete');
        Route::post('mainmenu/update-menu-order', 'ComponentController@updateMainmenuOrder');

        //slider routes
        Route::get('slider/list', 'ComponentController@slider_list');
        Route::post('slider/create', 'ComponentController@slider_create');
        Route::get('slider/edit/{id?}', 'ComponentController@slider_edit');


        //Know IMc routes
        Route::resource('Knowimc', 'KnowImcController');
        Route::get('footer1/list/{id?}/{type?}/{submenuid?}', 'ComponentController@footer1_list');
        Route::post('footer1/create', 'ComponentController@footer1_create');
        Route::post('footer1/delete', 'ComponentController@footer1_delete');
        Route::post('footer1/update-footer1-order', 'ComponentController@updateFooter1Order');
        Route::get('footer2/list/{id?}', 'ComponentController@footer2_list');
        Route::post('footer2/create', 'ComponentController@footer2_create');

        Route::prefix('init')->group(function () {
            Route::resource('categories', 'InitCategoryController');
            Route::get('/categories', 'InitCategoryController@index');
            Route::post('categories/deleteMultiple', 'InitCategoryController@deleteMultiple');

            Route::resource('projects', 'InitProjectController');
            Route::get('/projects', 'InitProjectController@index');
            Route::post('projects/deleteMultiple', 'InitProjectController@deleteMultiple');

            Route::resource('businessowners', 'InitBusinessOwnerController');
            Route::get('/businessowners', 'InitBusinessOwnerController@index');
            Route::post('businessowners/deleteMultiple', 'InitBusinessOwnerController@deleteMultiple');

            Route::resource('initiatives', 'InitiativesController');
            Route::get('/initiatives', 'InitiativesController@index');
            Route::get('/getcategories/{id}', 'InitiativesController@getcategories');
            Route::post('initiatives/deleteMultiple', 'InitiativesController@deleteMultiple');
        });
    });
    Route::namespace('ADMIN')->group(function () {


        Route::get('about/list/{id}/{about}', 'SettingController@about_list');
        Route::post('about/create', 'SettingController@about_create');
        Route::get('privacy/list/{id}/{privacy}', 'SettingController@about_list');
        Route::get('terms-conditions/list/{id}/{terms}', 'SettingController@about_list');

        Route::get('/contactlist', 'ContactusController@index');
        Route::get('/search/contact', 'ContactusController@index');
        Route::post('/deletecontact', 'ContactusController@delete');
        Route::post('/deletemultiplecontact', 'ContactusController@deletemultiplecontact');
        Route::get('/subscribe', 'ContactusController@subscribe');
        Route::get('/search/subscribe', 'ContactusController@subscribe');
        Route::post('/deletesubscriber', 'ContactusController@deletesubscriber');
        Route::post('/deletemultisubscriber', 'ContactusController@deletemultisubscriber');



        // enable or disable the sections
        Route::get('sections/list', 'SettingController@section_list');
        Route::post('sections/updatemultiplee', 'SettingController@updatemultiple');
        Route::post('sections/disablemultiple', 'SettingController@disablemultiple');
        Route::post('sections/updatesingle', 'SettingController@updatesingle');
        // Chnage logo
        Route::get('settings/logo/{id?}', 'SettingController@logo_list');
        Route::post('settings/logoupdate', 'SettingController@logoupdate');
        // Follow us
        Route::get('follow/list/{id?}', 'SettingController@follow_list');
        Route::post('follow/create', 'SettingController@follow_create');
        // Contact us
        Route::get('contact/list/{id}', 'SettingController@contact_list');
        Route::post('contact/create', 'SettingController@contact_create');
        // news heading update
        Route::get('heading/list', 'NewsController@heading_list');
        Route::post('heading/create', 'NewsController@heading_create');

        // news heading update
        Route::get('serviceheading/list', 'NewsController@serviceheading_list');
        Route::post('serviceheading/create', 'NewsController@serviceheading_create');

        Route::get('eventheading/list', 'NewsController@eventheading_list');
        Route::post('eventheading/create', 'NewsController@eventheading_create');

        // this is for health tips
        Route::get('health/listing', 'HealthController@listing');
        Route::get('health/create', 'HealthController@create');
        Route::get('health/edit/{id}', 'HealthController@editPage');
        Route::post('health/store', 'HealthController@store');
        Route::post('health/delete-single-page', 'HealthController@deleteSinglePage');
        Route::post('health/delete-multiple-pages', 'HealthController@deleteMultiplePages');

        Route::get('health/section', 'HealthController@section');
        Route::post('health/getSectionContent', 'HealthController@getSectionContent');
        Route::post('health/updateSectionContent', 'HealthController@updateSectionContent');


        // route for the news
        Route::get('news/listing', 'NewsController@listing');
        Route::get('news/create', 'NewsController@create');
        Route::get('news/edit/{id}', 'NewsController@editPage');
        Route::post('news/store', 'NewsController@store');
        Route::post('news/delete-single-page', 'NewsController@deleteSinglePage');
        Route::post('news/delete-multiple-pages', 'NewsController@deleteMultiplePages');

        Route::get('news/section', 'NewsController@section');
        Route::post('news/getSectionContent', 'NewsController@getSectionContent');
        Route::post('news/updateSectionContent', 'NewsController@updateSectionContent');


        // route for the awards
        Route::get('awards/listing', 'AwardController@listing');
        Route::get('awards/create', 'AwardController@create');
        Route::get('awards/edit/{id}', 'AwardController@editPage');
        Route::post('awards/store', 'AwardController@store');
        Route::post('awards/delete-single-page', 'AwardController@deleteSinglePage');
        Route::post('awards/delete-multiple-pages', 'AwardController@deleteMultiplePages');
        // affiliates

        Route::get('affiliates/listing', 'AffiliateController@listing');
        Route::get('affiliates/create', 'AffiliateController@create');
        Route::get('affiliates/edit/{id}', 'AffiliateController@editPage');
        Route::post('affiliates/store', 'AffiliateController@store');
        Route::post('affiliates/delete-single-page', 'AffiliateController@deleteSinglePage');
        Route::post('affiliates/delete-multiple-pages', 'AffiliateController@deleteMultiplePages');

        /* User Module routes */
        Route::get('users/create', 'UserController@create');
        Route::post('users/store', 'UserController@store');
        Route::get('users/listing', 'UserController@listing');

        Route::post('users/change-status', 'UserController@changeStatus');
        Route::get('users/edit/{id}', 'UserController@editUser');
        Route::post('users/save-edit-user', 'UserController@SaveEditUser');

        Route::post('users/delete-multiple-users', 'UserController@deleteMultiple');
        Route::post('users/update-multi-users-status', 'UserController@updateMultiUserStatus');
        Route::post('users/delete-single-user', 'UserController@deleteSingleUser');

        Route::get('users/change-password', 'UserController@ChangePassword');
        Route::post('users/change-password-submit', 'UserController@ChangePasswordSubmit');

        Route::get('users/change-profile', 'UserController@ChangeProfile');
        Route::post('users/change-profile-submit', 'UserController@ChangeProfileSubmit');


        Route::get('users/logout', 'UserController@logout');

        /* JOBS Module routes */
        Route::get('jobs/create', 'JobController@create');
        Route::post('jobs/store', 'JobController@store');
        Route::get('jobs/listing', 'JobController@listing');
        Route::get('jobs/edit/{id}', 'JobController@editPage');
        Route::post('jobs/delete-multiple-pages', 'JobController@deleteMultiplePages');
        Route::post('jobs/delete-single-page', 'JobController@deleteSinglePage');
        /* end JOBS Module routes */

        /* end user Module routes */

        /* Pages Module routes */
        Route::get('pages/create', 'PageController@create');
        Route::post('pages/store', 'PageController@store');
        Route::get('pages/listing', 'PageController@listing');

        Route::get('pages/edit/{id}', 'PageController@editPage');
        Route::post('pages/delete-multiple-pages', 'PageController@deleteMultiplePages');
        Route::post('pages/delete-single-page', 'PageController@deleteSinglePage');
        /* end pages Module routes */

        /* Menue Module routes */

        Route::get('menu/create', 'MenuController@create');
        Route::post('menu/store', 'MenuController@store');
        Route::get('menu/listing', 'MenuController@listing');

        Route::get('menu/edit-menu/{id}', 'MenuController@editMenu');
        Route::post('menu/delete-menu', 'MenuController@deleteSingleMenu');
        Route::post('menu/delete-multiple-menu', 'MenuController@deleteMultipleMenu');

        Route::get('menu/add-sub-menu', 'MenuController@createSubMenu');
        Route::post('menu/store-sub-menu', 'MenuController@storeSubMenu');
        Route::get('menu/menu-details/{id}', 'MenuController@menuDetails');

        Route::get('menu/edit-sub-menu/{id}', 'MenuController@editSubMenu');

        Route::post('menu/delete-sub-menu', 'MenuController@deleteSingleSubMenu');
        Route::post('menu/delete-multiple-sub-menu', 'MenuController@deleteMultipleSubMenu');
        Route::post('menu/update-menu-order', 'MenuController@updateMenuOrder');

        /* end menu Module routes */


        // route for the news
        Route::get('events/listing', 'EventController@listing');
        Route::get('events/create', 'EventController@create');
        Route::get('events/edit/{id}', 'EventController@editPage');
        Route::post('events/store', 'EventController@store');
        Route::post('events/delete-single-page', 'EventController@deleteSinglePage');
        Route::post('events/delete-multiple-pages', 'EventController@deleteMultiplePages');
        Route::get('events/banner', 'EventController@banner');
        Route::post('events/bannerUpdate', 'EventController@bannerUpdate');

        // Leaders
        Route::get('leaderships/listing', 'LeadershipController@listing');
        Route::get('leaderships/create', 'LeadershipController@create');
        Route::get('leaderships/edit/{id}', 'LeadershipController@editPage');
        Route::post('leaderships/store', 'LeadershipController@store');
        Route::post('leaderships/delete-single-page', 'LeadershipController@deleteSinglePage');
        Route::post('leaderships/delete-multiple-pages', 'LeadershipController@deleteMultiplePages');

        // Leaders
        Route::get('leadershipmessages/listing', 'LeadershipMessageController@listing');
        Route::get('leadershipmessages/create', 'LeadershipMessageController@create');
        Route::get('leadershipmessages/edit/{id}', 'LeadershipMessageController@editPage');
        Route::post('leadershipmessages/store', 'LeadershipMessageController@store');
        Route::post('leadershipmessages/delete-single-page', 'LeadershipMessageController@deleteSinglePage');
        Route::post('leadershipmessages/delete-multiple-pages', 'LeadershipMessageController@deleteMultiplePages');


        // Leaders
        Route::get('services/listing', 'ServiceController@listing');
        Route::get('services/create', 'ServiceController@create');
        Route::get('services/edit/{id}', 'ServiceController@editPage');
        Route::post('services/store', 'ServiceController@store');
        Route::post('services/delete-single-page', 'ServiceController@deleteSinglePage');
        Route::post('services/delete-multiple-pages', 'ServiceController@deleteMultiplePages');

        // route for the awards
        Route::get('sliders/listing', 'SliderController@listing');
        Route::get('sliders/create', 'SliderController@create');
        Route::get('sliders/edit/{id}', 'SliderController@editPage');
        Route::post('sliders/store', 'SliderController@store');
        Route::post('sliders/delete-single-page', 'SliderController@deleteSinglePage');
        Route::post('sliders/delete-multiple-pages', 'SliderController@deleteMultiplePages');


        // route for the awards
        Route::get('testimonials/listing', 'TestimoniesController@listing');
        Route::get('testimonials/create', 'TestimoniesController@create');
        Route::get('testimonials/edit/{id}', 'TestimoniesController@editPage');
        Route::post('testimonials/store', 'TestimoniesController@store');
        Route::post('testimonials/delete-single-page', 'TestimoniesController@deleteSinglePage');
        Route::post('testimonials/delete-multiple-pages', 'TestimoniesController@deleteMultiplePages');


        // route for the awards
        Route::get('knowimcs/listing', 'KnowImcController@listing');
        Route::get('knowimcs/create', 'KnowImcController@create');
        Route::get('knowimcs/edit/{id}', 'KnowImcController@editPage');
        Route::post('knowimcs/store', 'KnowImcController@store');
        Route::post('knowimcs/delete-single-page', 'KnowImcController@deleteSinglePage');
        Route::post('knowimcs/delete-multiple-pages', 'KnowImcController@deleteMultiplePages');


        // route for the awards
        Route::get('histories/listing', 'HistoryController@listing');
        Route::get('histories/create', 'HistoryController@create');
        Route::get('histories/edit/{id}', 'HistoryController@editPage');
        Route::post('histories/store', 'HistoryController@store');
        Route::post('histories/delete-single-page', 'HistoryController@deleteSinglePage');
        Route::post('histories/delete-multiple-pages', 'HistoryController@deleteMultiplePages');
        Route::get('histories/title', 'HistoryController@historytitle');
        Route::post('histories/savetitle', 'HistoryController@savetitle');






        Route::get('carrersusers/listing', 'CarrersUserController@listing');
        Route::post('carrersusers/change-status', 'CarrersUserController@changeStatus');
        Route::get('carrersusers/edit/{id}', 'CarrersUserController@editUser');
        Route::post('carrersusers/save-edit-user', 'CarrersUserController@SaveEditUser');
        Route::post('carrersusers/delete-multiple-users', 'CarrersUserController@deleteMultiple');
        Route::post('carrersusers/update-multi-users-status', 'CarrersUserController@updateMultiUserStatus');
        Route::post('carrersusers/delete-single-user', 'CarrersUserController@deleteSingleUser');
        Route::get('carrersusers/change-password', 'CarrersUserController@ChangePassword');
        Route::post('carrersusers/change-password-submit', 'CarrersUserController@ChangePasswordSubmit');
        Route::get('carrersusers/logout', 'CarrersUserController@logout');
    });
});


Route::group(array('prefix' => 'en'), function() {

    Route::get('initiatives', 'InitiativeControler@index');

    Route::get('404', ['as' => '404', 'uses' => 'ErrorHandlerController@errorCode404']);
    Route::get('405', ['as' => '405', 'uses' => 'ErrorHandlerController@errorCode405']);
    Route::get('500', ['as' => '500', 'uses' => 'ErrorHandlerController@errorCode500']);
});
Route::group(array('prefix' => 'en'), function() {

    Route::get('care-network', function () {
        return Redirect::to('en/mayoclinic');
    });

    Route::get('obgyn-campaign', function () {
        return Redirect::to('en/department/womens-health-center');
    });



    Route::get('power-now-presence', function () {
        return Redirect::to('en/event/power-of-now-presence');
    });
    Route::get('phlebotomy-guidelines-workshop', function () {
        return Redirect::to('en/event/phlebotomy-guidelines-workshop');
    });
    Route::get('Echocardiography-2019', function () {
        return Redirect::to('en/event/the-8th-imc-echocardiography');
    });
    Route::get('musculoskeletal-mri-review-course', function () {
        return Redirect::to('en/event/musculoskeletal-mri-review-course');
    });


    Route::get('404', ['as' => '404', 'uses' => 'ErrorHandlerController@errorCode404']);
    Route::get('405', ['as' => '405', 'uses' => 'ErrorHandlerController@errorCode405']);
    Route::get('500', ['as' => '500', 'uses' => 'ErrorHandlerController@errorCode500']);


//Front Home routes
    Route::get('/home', 'imc_homeController@index')->name('home');
    Route::get('/', 'imc_homeController@index')->name('/');

    Route::post('carreiersave', 'CarrersController@carreiersave');


// Created By gurpreet
// Mobile API API
    Route::get('getpage/{type}', 'GpController@getpage');

    Route::post('/deplist', 'GpController@deplist');
    Route::get('/doctorlist/{id}', 'GpController@doctorlist');
    Route::get('/doctordetail/{id}', 'GpController@doctordetail');
    Route::get('/doctorinfo/{id}', 'GpController@doctorinfo');
    Route::get('/alldoctor/{perpage}', 'GpController@alldoctor');
    Route::get('/language', 'GpController@language');
    Route::post('/searchDoctor', 'GpController@searchDoctor');
    Route::get('/departmentlist', 'GpController@departmentlist');
// Close API
//Route::get('{slug}', 'GpController@showview');
    Route::get('setlanguage/{type}', 'GpController@setlanguage');
    Route::get('news-article', 'GpController@shownews');
    Route::get('events', 'GpController@showevents');
    Route::get('awards-and-accreditations', 'GpController@showawards');
    Route::get('show-leaderships', 'GpController@showleaderships');
    Route::get('leadership-messages', 'GpController@leadershipmessage');
    Route::get('medical-services', 'GpController@showservices');
    Route::get('history', 'GpController@showhistories');
    Route::get('about-us', 'GpController@showabout');
    Route::get('social-media-policy', 'GpController@showprivacy');
    Route::get('terms-and-conditions', 'GpController@showterms');
    Route::get('site-map', 'GpController@showsitemap');
    Route::get('contact-us', 'GpController@showprivacy');
    Route::get('mayoclinic', 'GpController@showmayoclinic');
    Route::get('medical-disclaimer', 'GpController@showmedical');
//@jay
//Front Home routes
    Route::resource('/appointment', 'AppointmentController');
    Route::resource('/visitor', 'VisitorController');
    Route::resource('/patientright', 'PatientrightController');
    Route::resource('/benefit', 'BenefitsController');
    Route::post('/testimonial/loadMore', 'TestimonialController@loadMore');
    Route::resource('/testimonial', 'TestimonialController');
    Route::resource('/stayingimc', 'StayingImcsController');
    Route::resource('/patientlibrary', 'PatientlibraryController');
    Route::get('/doctors', 'DoctorController@index');
    Route::get('/search/doctors', 'DoctorController@index');
    Route::get('/search/doctors/{doctors}', 'DoctorController@index');
    Route::get('/event/doctors', function () {
        return redirect('/doctors');
    });

// Ajax SearchController Doctor
    Route::get('/doctorsearch', 'DoctorController@doctorsearch');
    Route::get('/searchalphabet/{id}', 'DoctorController@searchalphabet');

// Close


    Route::get('/doctors/profile', 'DoctorController@profile');
    Route::get('/doctorsprofile/{id}', 'DoctorController@profile');

    Route::get('/clinics', 'ClinicController@index');
//Route::get('/location', 'LocationController@index');
    Route::get('location', function () {
        return Redirect::to('en/location/21.5135/39.1741');
    });
    Route::get('/location/{lat}/{lng}', 'LocationController@index');


    Route::get('/academy', 'AcademyController@index');
    Route::get('/survey', 'SurveyController@index');
    Route::get('/residence', 'ResidencesController@index');
    Route::get('/search', 'SearchController@index');
    Route::get('/event', 'EventController@index');
    Route::get('/event/{id}', 'EventController@getEvent');
    Route::post('/event/loadMore', 'EventController@loadMore');

    Route::post('/event/search', 'EventController@index');
    Route::get('/event/search', function () {
        return redirect()->back();
    });
//Route::get('/departments', 'DepartmentController@index');
//Route::get('/department/{id}', 'DepartmentController@department');
    Route::get('/contact-us', 'GpController@showcontactuspage');
    Route::post('/contsave', 'GpController@contsave');
    Route::get('/departmentlisting/{search}', 'GpController@departmentlisting');
    Route::get('/departments', 'GpController@departmentindex');
    Route::post('/search/departments', 'GpController@departmentindex');
    Route::get('/search/departments', function () {
        return redirect('/departments');
    });
    Route::get('/dpsearch/{search}/{lang}', 'GpController@dpsearch');

    Route::get('/search/departments/{dept}', 'GpController@departmentindex');
    Route::get('/department/{id}', 'GpController@departmentindexwithid');


//Front Home routes
// Dennis
    Route::get('/Patients-Education-Library', 'PatientsEducationLibrary@index')->name('Patients-Education-Library');
    Route::get('/updtestatuss/{status}/{id}', 'GpController@updtestatuss');
    Route::get('/subscribe/{email}', 'GpController@subscribeemail');
    Route::resource('/career', 'CarrersController');
    Route::post('/store', 'CarrersController@store');
    Route::resource('health-tips', 'HealthController');
    Route::get('/survey/{id}', 'SurveyController@innerpage');
    Route::get('/news/{id}', 'NewsController@innerpage');
    Route::get('/healthtips/{slug}', 'HealthController@innerpage');
    Route::get('{page}', 'GpController@custompage');
});


Route::group(array('prefix' => 'ar'), function() {


    Route::get('obgyn-campaign', function () {
        return Redirect::to('ar/department/womens-health-center');
    });

    Route::get('colon-surgeries', function () {
        return Redirect::to('ar/news/colon-surgeries');
    });

    Route::get('national-day-89', function () {
        return Redirect::to('ar/news/our-blood-for-protectors-of-our-nation');
    });

    Route::get('imc-medical-residents', function () {
        return Redirect::to('ar/news/the-imc-honors-medical-residents');
    });
    Route::get('IFSO-Global-Meeting', function () {
        return Redirect::to('en/news/the-ifso-global-meeting-2019');
    });
    Route::get('ivf', function () {
        return Redirect::to('ar/department/assisted-reproductive-technology');
    });

    Route::get('care-network', function () {
        return Redirect::to('ar/mayoclinic');
    });


    Route::get('power-now-presence', function () {
        return Redirect::to('ar/event/power-of-now-presence');
    });
    Route::get('phlebotomy-guidelines-workshop', function () {
        return Redirect::to('ar/event/phlebotomy-guidelines-workshop');
    });
    Route::get('Echocardiography-2019', function () {
        return Redirect::to('ar/event/the-8th-imc-echocardiography');
    });
    Route::get('musculoskeletal-mri-review-course', function () {
        return Redirect::to('ar/event/musculoskeletal-mri-review-course');
    });

    Route::get('healthtips/{slug}', 'HealthController@innerpage');

    Route::get('404', ['as' => '404', 'uses' => 'ErrorHandlerController@errorCode404']);
    Route::get('405', ['as' => '405', 'uses' => 'ErrorHandlerController@errorCode405']);
    Route::get('500', ['as' => '500', 'uses' => 'ErrorHandlerController@errorCode500']);
    Route::post('carreiersave', 'CarrersController@carreiersave');

//Front Home routes
    Route::get('/home', 'imc_homeController@index')->name('home');
    Route::get('/', 'imc_homeController@index')->name('/');
// Created By gurpreet
    Route::get('getpage/{type}', 'GpController@getpage');
//Route::get('{slug}', 'GpController@showview');
    Route::get('setlanguage/{type}', 'GpController@setlanguage');
    Route::get('news-article', 'GpController@shownews');
    Route::get('events', 'GpController@showevents');
    Route::get('awards-and-accreditations', 'GpController@showawards');
    Route::get('show-leaderships', 'GpController@showleaderships');
    Route::get('leadership-messages', 'GpController@leadershipmessage');
    Route::get('medical-services', 'GpController@showservices');
    Route::get('history', 'GpController@showhistories');
    Route::get('about-us', 'GpController@showabout');
    Route::get('social-media-policy', 'GpController@showprivacy');
    Route::get('terms-and-conditions', 'GpController@showterms');
    Route::get('site-map', 'GpController@showsitemap');
    Route::get('contact-us', 'GpController@showprivacy');
    Route::get('mayoclinic', 'GpController@showmayoclinic');
    Route::get('medical-disclaimer', 'GpController@showmedical');
//@jay
//Front Home routes
    Route::resource('/appointment', 'AppointmentController');
    Route::resource('/visitor', 'VisitorController');
    Route::resource('/patientright', 'PatientrightController');
    Route::resource('/benefit', 'BenefitsController');
    Route::post('/testimonial/loadMore', 'TestimonialController@loadMore');
    Route::resource('/testimonial', 'TestimonialController');
    Route::resource('/stayingimc', 'StayingImcsController');
    Route::resource('/patientlibrary', 'PatientlibraryController');
    Route::get('/doctors', 'DoctorController@index');
    Route::get('/search/doctors', 'DoctorController@index');
    Route::get('/search/doctors/{doctors}', 'DoctorController@index');
    Route::get('/event/doctors', function () {
        return redirect('/doctors');
    });

// Ajax SearchController Doctor
    Route::get('/doctorsearch', 'DoctorController@doctorsearch');
    Route::get('/searchalphabet/{id}', 'DoctorController@searchalphabet');

// Close


    Route::get('/doctors/profile', 'DoctorController@profile');
    Route::get('/doctorsprofile/{id}', 'DoctorController@profile');

    Route::get('/clinics', 'ClinicController@index');
//Route::get('/location', 'LocationController@index');
    Route::get('location', function () {
        return Redirect::to('en/location/21.5135/39.1741');
    });
    Route::get('/location/{lat}/{lng}', 'LocationController@index');

    Route::get('/academy', 'AcademyController@index');
    Route::get('/survey', 'SurveyController@index');
    Route::get('/residence', 'ResidencesController@index');
    Route::get('/search', 'SearchController@index');
    Route::get('/event', 'EventController@index');
    Route::get('/event/{id}', 'EventController@getEvent');
    Route::post('/event/loadMore', 'EventController@loadMore');

    Route::post('/event/search', 'EventController@index');
    Route::get('/event/search', function () {
        return redirect()->back();
    });
//Route::get('/departments', 'DepartmentController@index');
//Route::get('/department/{id}', 'DepartmentController@department');
    Route::get('/contact-us', 'GpController@showcontactuspage');
    Route::post('/contsave', 'GpController@contsave');
    Route::get('/departmentlisting/{search}', 'GpController@departmentlisting');
    Route::get('/departments', 'GpController@departmentindex');
    Route::post('/search/departments', 'GpController@departmentindex');
    Route::get('/search/departments', function () {
        return redirect('/departments');
    });
    Route::get('/dpsearch/{search}/{lang}', 'GpController@dpsearch');

    Route::get('/search/departments/{dept}', 'GpController@departmentindex');
    Route::get('/department/{id}', 'GpController@departmentindexwithid');


//Front Home routes
// Dennis
    Route::get('/Patients-Education-Library', 'PatientsEducationLibrary@index')->name('Patients-Education-Library');
    Route::get('/updtestatuss/{status}/{id}', 'GpController@updtestatuss');
    Route::get('/subscribe/{email}', 'GpController@subscribeemail');
    Route::resource('/career', 'CarrersController');
    Route::post('/store', 'CarrersController@store');
    Route::resource('health-tips', 'HealthController');
    Route::get('/survey/{id}', 'SurveyController@innerpage');
    Route::get('/news/{id}', 'NewsController@innerpage');
    Route::get('{page}', 'GpController@custompage');
});


//Front Home routes

Route::get('/home', 'imc_homeController@index')->name('home');

Route::get('/', 'imc_homeController@index')->name('/');

Route::get('/', function () {
    return redirect('/en/');
});
// Routes for the Symptom trackers



Route::post('carreiersave', 'CarrersController@carreiersave');

Route::get('404', ['as' => '404', 'uses' => 'ErrorHandlerController@errorCode404']);
Route::get('405', ['as' => '405', 'uses' => 'ErrorHandlerController@errorCode405']);
Route::get('500', ['as' => '500', 'uses' => 'ErrorHandlerController@errorCode500']);

// Created By gurpreet
// Mobile API API
Route::get('getpage/{type}', 'GpController@getpage');
Route::post('/deplist', 'GpController@deplist');
Route::get('/doctorlist/{id}', 'GpController@doctorlist');
Route::get('/doctordetail/{id}', 'GpController@doctordetail');
Route::get('/alldoctor/{perpage}', 'GpController@alldoctor');
Route::get('/language', 'GpController@language');
Route::post('/searchDoctor', 'GpController@searchDoctor');
Route::get('/departmentlist', 'GpController@departmentlist');
Route::get('/healthcategory', 'GpController@healthcategory');
Route::post('/searchhealttips', 'GpController@searchhealttips');
Route::post('/searchhealttips', 'GpController@searchhealttips');
Route::post('/adddoctor', 'GpController@adddoctor');
Route::post('/doctoractivate', 'GpController@doctoractivate');

// Close API
//Route::get('{slug}', 'GpController@showview');
Route::get('setlanguage/{type}', 'GpController@setlanguage');
Route::get('news-article', 'GpController@shownews');
Route::get('events', 'GpController@showevents');
Route::get('awards-and-accreditations', 'GpController@showawards');
Route::get('show-leaderships', 'GpController@showleaderships');
Route::get('leadership-messages', 'GpController@leadershipmessage');
Route::get('medical-services', 'GpController@showservices');
Route::get('history', 'GpController@showhistories');
Route::get('about-us', 'GpController@showabout');
Route::get('social-media-policy', 'GpController@showprivacy');
Route::get('terms-and-conditions', 'GpController@showterms');
Route::get('site-map', 'GpController@showsitemap');
Route::get('contact-us', 'GpController@showprivacy');
Route::get('mayoclinic', 'GpController@showmayoclinic');
Route::get('medical-disclaimer', 'GpController@showmedical');
//@jay
//Front Home routes
Route::resource('/appointment', 'AppointmentController');
Route::resource('/visitor', 'VisitorController');
Route::resource('/patientright', 'PatientrightController');
Route::resource('/benefit', 'BenefitsController');
Route::post('/testimonial/loadMore', 'TestimonialController@loadMore');
Route::resource('/testimonial', 'TestimonialController');
Route::resource('/stayingimc', 'StayingImcsController');
Route::resource('/patientlibrary', 'PatientlibraryController');
Route::get('/doctors', 'DoctorController@index');
Route::get('/search/doctors', 'DoctorController@index');
Route::get('/search/doctors/{doctors}', 'DoctorController@index');
Route::get('/event/doctors', function () {
    return redirect('/doctors');
});

// Ajax SearchController Doctor
Route::get('/doctorsearch', 'DoctorController@doctorsearch');
Route::get('/searchalphabet/{id}', 'DoctorController@searchalphabet');

// Close
Route::get('/doctors/profile', 'DoctorController@profile');
Route::get('/doctorsprofile/{id}', 'DoctorController@profile');

Route::get('/clinics', 'ClinicController@index');
//Route::get('/location', 'LocationController@index');
Route::get('location', function () {
    return Redirect::to('en/location/21.5135/39.1741');
});
Route::get('/location/{lat}/{lng}', 'LocationController@index');

Route::get('/academy', 'AcademyController@index');
Route::get('/survey', 'SurveyController@index');
Route::get('/residence', 'ResidencesController@index');
Route::get('/search', 'SearchController@index');
Route::get('/event', 'EventController@index');
Route::get('/event/{id}', 'EventController@getEvent');
Route::post('/event/loadMore', 'EventController@loadMore');

Route::post('/event/search', 'EventController@index');
Route::get('/event/search', function () {
    return redirect()->back();
});
//Route::get('/departments', 'DepartmentController@index');
//Route::get('/department/{id}', 'DepartmentController@department');
Route::get('/contact-us', 'GpController@showcontactuspage');
Route::post('/contsave', 'GpController@contsave');
Route::get('/departmentlisting/{search}', 'GpController@departmentlisting');
Route::get('/departments', 'GpController@departmentindex');
Route::post('/search/departments', 'GpController@departmentindex');
Route::get('/search/departments', function () {
    return redirect('/departments');
});

Route::get('/dpsearch/{search}/{lang}', 'GpController@dpsearch');
Route::get('/search/departments/{dept}', 'GpController@departmentindex');
Route::get('/department/{id}', 'GpController@departmentindexwithid');

Route::get('/doctorinfo/{id}', 'GpController@doctorinfo');

//Front Home routes
// Dennis
Route::get('/Patients-Education-Library', 'PatientsEducationLibrary@index')->name('Patients-Education-Library');
Route::get('/updtestatuss/{status}/{id}', 'GpController@updtestatuss');
Route::get('/subscribe/{email}', 'GpController@subscribeemail');
Route::resource('/career', 'CarrersController');
Route::post('/store', 'CarrersController@store');
Route::resource('health-tips', 'HealthController');
Route::get('/survey/{id}', 'SurveyController@innerpage');
Route::get('/news/{id}', 'NewsController@innerpage');
Route::get('/healthtips/{slug}', 'HealthController@innerpage');
Route::get('/getdocimage/{id}', 'DoctorController@getdocimage');
Route::get('power-now-presence', function () {
    return Redirect::to('event/power-of-now-presence');
});
Route::get('phlebotomy-guidelines-workshop', function () {
    return Redirect::to('event/phlebotomy-guidelines-workshop');
});
Route::get('Echocardiography-2019', function () {
    return Redirect::to('event/the-8th-imc-echocardiography');
});
Route::get('musculoskeletal-mri-review-course', function () {
    return Redirect::to('event/musculoskeletal-mri-review-course');
});
Route::get('{page}', 'GpController@custompage');
