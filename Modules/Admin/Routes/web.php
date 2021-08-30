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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.get.dashboard');
    //Qly phong ban
    Route::group(['prefix' => 'department'], function (){
       Route::get('/','AdminDepartmentController@index')->name('admin.get.list.department');
       Route::get('/create','AdminDepartmentController@create')->name('admin.get.create.department');
       Route::post('/create','AdminDepartmentController@store')->name('admin.get.post.department');
        //update
        Route::get('update/{id}','AdminDepartmentController@edit')->name('admin.get.update.department');
        //Save
        Route::post('update/{id}','AdminDepartmentController@store');
        Route::post('update/{id}','AdminDepartmentController@update')->name('admin.update.department');
        //Delete
        Route::get('delete/{id}','AdminDepartmentController@delete')->name('admin.get.delete.department');
        //Action
        Route::get('active/{id}','AdminDepartmentController@active')->name('admin.get.active.department');
    });

    //Qly vi tri nhan vien
    Route::group(['prefix' => 'position'], function (){
        Route::get('/','AdminPositionController@index')->name('admin.get.list.position');
        Route::get('/create','AdminPositionController@create')->name('admin.get.create.position');
        Route::post('/create','AdminPositionController@store')->name('admin.get.post.position');
        //update
        Route::get('update/{id}','AdminPositionController@edit')->name('admin.get.update.position');
        //Save
        Route::post('update/{id}','AdminPositionController@store');
        Route::post('update/{id}','AdminPositionController@update')->name('admin.update.position');
        //Delete
        Route::get('delete/{id}','AdminPositionController@delete')->name('admin.get.delete.position');
    });
    Route::group(['prefix' => 'employee'], function (){
        //Qly nhan vien
        Route::get('/','AdminEmployeeController@index')->name('admin.get.list.employee');
        Route::get('/create','AdminEmployeeController@create')->name('admin.get.create.employee');
        Route::post('/create','AdminEmployeeController@store')->name('admin.post.create.employee');
        //update
        Route::get('update/{id}','AdminEmployeeController@edit')->name('admin.get.update.employee');
        //Save infor
//        Route::post('update/{id}','AdminEmployeeController@store');
        Route::post('update','AdminEmployeeController@update')->name('admin.update.employee');

        //Delete
        Route::get('delete/{id}','AdminEmployeeController@delete')->name('admin.get.delete.employee');
        //save avatar
        Route::post('update/avatar', 'AdminEmployeeController@uploadAvatar')->name('upload');
        //View chi tiết thông tin
        Route::get('view-employee/{id}', 'AdminEmployeeController@getEmployeeDetail')->name('ajax.admin.get.detail.employee');

    });
    //Form xin nghi
    Route::group(['prefix' => 'form'], function (){
       Route::get('/','AdminFormController@index')->name('admin.get.list.form');
       Route::get('action/{action}/{id}','AdminFormController@action')->name('admin.get.action.form');

    });
    //Chi tieu phòng ban
    Route::group(['prefix' => 'target_department'], function (){
       Route::get('/','AdminTargetDepartmentController@index')->name('admin.get.list.target_department');
       Route::get('/create','AdminTargetDepartmentController@create')->name('admin.get.create.target_department');
       Route::post('/create','AdminTargetDepartmentController@store')->name('admin.get.post.target_department');

        //update
        Route::get('update/{id}','AdminTargetDepartmentController@edit')->name('admin.get.update.target_department');
        //Save
        Route::post('update/{id}','AdminTargetDepartmentController@store');
        Route::post('update/{id}','AdminTargetDepartmentController@update');
        //Action
        Route::get('active/{id}','AdminTargetDepartmentController@active')->name('admin.get.active.target_department');
        //Delete
        Route::get('delete/{id}','AdminTargetDepartmentController@delete')->name('admin.get.delete.target_department');
    });
    //Chỉ tiêu nhân viên
    Route::group(['prefix' => 'target_employee'], function (){
       Route::get('/','AdminTargetEmployeeController@index')->name('admin.get.list.target_employee');
       Route::get('/create','AdminTargetEmployeeController@create')->name('admin.get.create.target_employee');
       Route::post('/create','AdminTargetEmployeeController@store')->name('admin.get.post.target_employee');

       Route::get('getPosition/{id}','AdminTargetEmployeeController@getPosition');

       Route::get('active/{id}','AdminTargetEmployeeController@active')->name('admin.get.active.target_employee');

    });



});
