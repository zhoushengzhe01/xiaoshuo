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

Route::get('book/{fiction_id}', 'HomeController@getBook');
Route::get('book/{fiction_id}/{catalog_id}', 'HomeController@getRead');
Route::get('list/{category_id}', 'ListController@getList');
Route::get('ranking/{type}', 'ListController@getRanking');
Route::get('search', 'ListController@getSearch');
Route::get('author', 'ListController@getAuthor');

//浏览
Route::get('history', 'HistoryController@getHistorys');
Route::get('history/del/{history_id}', 'HistoryController@delHistorys');

//登陆注册
Route::get('logout', 'AuthController@getLogout');
Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('register', 'AuthController@getRegister');
Route::post('register', 'AuthController@postRegister');

//收藏
Route::get('collect', 'Member\CollectController@getCollects');
Route::any('collect/{action}', 'Member\CollectController@actionCollect');

//推荐
Route::get('recommend/{fictions_id}', 'Member\RecommendController@getRecommend');

//会员资料
Route::get('userinfo', 'Member\UserController@getUserinfo');
Route::get('useredit', 'Member\UserController@getUseredit');
Route::post('useredit', 'Member\UserController@postUseredit');
//设置头像
Route::get('sethead', 'Member\UserController@getSethead');
Route::post('sethead', 'Member\UserController@postSethead');
//修改密码
Route::get('passedit', 'Member\UserController@getPassedit');
Route::post('passedit', 'Member\UserController@postPassedit');

//邮件
Route::get('messages/{type}', 'Member\MessageController@getMessages');
Route::get('message/{message_id}', 'Member\MessageController@getMessage');
Route::get('message/del/{message_id}', 'Member\MessageController@delMessage');
Route::get('sendmessage', 'Member\MessageController@getSendmessage');
Route::post('sendmessage', 'Member\MessageController@postSendmessage');



Route::any('{all}', function(){die("404不存在的路由");})->where('all', '.*');