<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home',['as'=>'home','uses'=>'HomeController@index']);
	//Route::get('/home', 'HomeController@index');
    
	//Route::resource('users','UserController');
        Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
	Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
	Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
	Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
	Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);

	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

	

	//PNR Request Creation 
	Route::get('pnrrequestcreation', 'PnrRequestController@pnrRequestCreation');

	//PNR Request Submission
	Route::post('pnrrequestsubmission', 'PnrRequestController@pnrRequestSubmission');

    //PNR Process by InESS CE
   Route::get('PNR/{requestid}/CE',['as'=>'CE.Process','uses'=>'ProcessController@getByID']);

   //PNR Updation
  Route::post('pnr/{requestid}/update',['as'=>'PNR.Update','uses'=>'ProcessController@PNRUpdate']);

});


///Dashboard for CE
Route::get('dashnoard/ce',['as'=>'CE.Dashboard','uses'=>'DashboardController@CEdashboard']);

//Dashboard for JCE
Route::get('dashnoard/jce',['as'=>'JCE.Dashboard','uses'=>'DashboardController@JCEdashboard']);

//Dashboard for Coordinator
Route::get('dashnoard/coordinator',['as'=>'Coordinator.Dashboard','uses'=>'DashboardController@Coordinatordashboard']);

//Dashboard for Requestor
Route::get('dashnoard/Requestor',['as'=>'Requestor.Dashboard','uses'=>'DashboardController@Requestordashboard']);


//Dashboard for Library
Route::get('dashnoard/library',['as'=>'Library.Dashboard','uses'=>'DashboardController@Librarydashboard']);

//Assign PNR to Respective CE
Route::post('assigntoce/{id}','CoordinatorController@assignInessCe');

//Librain Edit
Route::get('libraryedit/{id}', 'LibraryController@editRequest');

//Librain Updation
Route::post('LibraryUpdate/{requestid}/update',['as'=>'Library.Update','uses'=>'LibraryController@Update']);

//File Download
Route::get('/attachment/{filename}/download',['as'=>'Download.Attachment','uses'=>'ProcessController@downloadAttachment']);


//File Destroy
Route::get('/attachment/{id}/delete',['as'=>'Delete.Attachment','uses'=>'ProcessController@destroy']);

//CC Ajax

Route::get('getccdetails', 'PnrRequestController@getCCDetails');
Route::get('getccdescription', 'PnrRequestController@getccDescription');


//Route For Login Credentials
Route::get('checkmailid',['as'=>'checkmailid','uses'=>'UserController@emailCheck']);

//Route For Report
Route::get('reports', 'ReportController@reports');
Route::post('reportformsubmit', 'ReportController@reportFormSubmit');


//template content
Route::get('Manufacturing',['as'=>'Manufacturing','uses'=>'HomeController@Manufacturing']);
Route::get('Suppliers',['as'=>'Suppliers','uses'=>'HomeController@Suppliers']);
Route::get('OpenSource',['as'=>'OpenSource','uses'=>'HomeController@OpenSource']);
Route::get('Sales',['as'=>'Sales','uses'=>'HomeController@Sales']);


//route for Search
Route::get('/search',['as'=>'Search','uses'=>'SearchController@index']);

Route::post('/postSearch',['as'=>'Search.Request','uses'=>'SearchController@searchData']);


Route::get('/searchbyid',['as'=>'RequestID.Search','uses'=>'SearchController@searchbyID']);

Route::post('searchbyidformsubmit', 'SearchController@searchByIdFormSubmit');



//

Route::get('/preliminary',['as'=>'Preliminary','uses'=>'PnrRequestController@preliminaryCreation']);

Route::post('/preliminarycontinue',['as'=>'Preliminary.Submit','uses'=>'PnrRequestController@preliminarySubmission']);

Route::post('/partcontinue',['as'=>'partcontinue.Submit','uses'=>'PnrRequestController@preliminarypartsubmission']);

Route::get('/partdata',['as'=>'Partdata','uses'=>'PnrRequestController@partData']);
Route::get('/verifyPartData',['as'=>'Verify.PartData','uses'=>'PnrRequestController@verifyPartData']);

Route::post('savePNRRequest', 'PnrRequestController@savePNRRequest');

Route::post('savePNRRequesttoDB', 'PnrRequestController@savetoDB');



//File Download and Delete
Route::get('verifyfiledownload/{id}', 'PnrRequestController@verifyFileDownload');
Route::get('verifyfiledelete/{id}', 'PnrRequestController@verifyFileDelete');

