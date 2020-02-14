<?php


//Main
Route::get('/', 'MainController@Index');



//Admin
Route::get('/admin/login', 'AdminController@Login');
Route::post('/admin/login', 'AdminController@Login');
Route::get('/admin', 'AdminController@Index');
Route::get('/admin/logout', 'AdminController@Logout');
Route::get('/admin/topic/add','AdminController@AddTopic');
Route::post('/admin/topic/add','AdminController@AddTopic');
Route::get('/admin/topics', 'AdminController@DisplayTopics');