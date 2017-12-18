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
Route::get('/', 'HomeController@getIndex');

Route::get('/book/{fiction_id}', 'HomeController@getBook');
Route::get('/book/{fiction_id}/{catalog_id}', 'HomeController@getRead');
Route::get('/list/{category_id}', 'ListController@getList');
Route::get('/ranking/{category_id}', 'ListController@getRanking');
Route::get('/search/{category_id}', 'ListController@getSearch');

//登陆注册
Route::get('/logout', 'Member\AuthController@getLogout');
Route::get('/login', 'Member\AuthController@getLogin');
Route::post('/login', 'Member\AuthController@postLogin');
Route::get('/register', 'Member\AuthController@getRegister');
Route::post('/register', 'Member\AuthController@postRegister');

//会员
Route::get('/bookcase', 'Member\UserController@getBookcase');
Route::get('/userinfo', 'Member\UserController@getUserinfo');
Route::get('/useredit', 'Member\UserController@getUseredit');
Route::post('/useredit', 'Member\UserController@postUseredit');
//设置头像
Route::get('/setavatar', 'Member\UserController@getSetavatar');
Route::post('/setavatar', 'Member\UserController@postSetavatar');
//修改密码
Route::get('/passedit', 'Member\UserController@getPassedit');
Route::post('/passedit', 'Member\UserController@postPassedit');
//邮件
Route::get('/inboxemail', 'Member\EmailController@getInboxemail');
Route::get('/outboxemail', 'Member\EmailController@getOutboxemail');
Route::get('/sendemail', 'Member\EmailController@getSendemail');
Route::post('/sendemail', 'Member\EmailController@postSendemail');

