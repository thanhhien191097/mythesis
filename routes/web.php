<?php
use \App\Mail\SendEmailMailable;


Route::get('/', [
	'as' => 'index',
	'uses' => 'TemplateController@index'
]);

Route::get('homepage', [
	'as' => 'homepage',
	'uses' => 'TemplateController@templateList'
]);

Route::get('template/{id}', [
	'as' => 'template',
	'uses' => 'TemplateController@getTemplate'
]);

Route::get('download/{id}', [
	'as' => 'download',
	'uses' => 'TemplateController@downloadTemplate'
]);

Route::get('download_template_excel/{template}', [
	'as' => 'download_template_excel',
	'uses' => 'TemplateController@downloadTemplateExcel'
]);

Route::post('post_excel', [
	'as' => 'post_excel',
	'uses' => 'TemplateController@postExcel'
]);

Route::post('downloadPost', [
	'as' => 'download.post',
	'uses' => 'TemplateController@downloadPostTemplate'
]);

Route::post('execute_excel', [
	'as' => 'execute.excel',
	'uses' => 'TemplateController@executeExcel'
]);

// Route::get('sendEmail', [
// 	'as' => 'sendEmail',
// 	'uses' => 'TemplateController@sendMail'
// ]);

Route::get('sendEmail', function(){
	Mail::to('buingoc.thanhhien@gmail.com')->send(new SendEmailMailable());
	return 'Send Email Successfully';
});
