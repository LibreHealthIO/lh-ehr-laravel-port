<?php

Route::group(['middleware' => 'web', 'prefix' => 'reportgenerator', 'namespace' => 'Modules\ReportGenerator\Http\Controllers'], function()
{
    Route::get('/', 'ReportGeneratorController@index');

    Route::get('/generate', 'ReportGeneratorController@getComponents');

    Route::get('/report/{option_ids}', 'ReportGeneratorController@showReport');

    /*** System Feature routes ***/
    Route::resource('system_feature', 'SystemFeatureController');
    /*
    Route::get('/system_feature', 'SystemFeatureController@index'); // show all system features

    Route::post('/system_feature', 'SystemFeatureController@store'); // create new system feature

    Route::patch('/system_feature/{id}/{feature_name}/{description}', 'SystemFeatureController@update'); // update system feature

    Route::delete('/system_feature/{id}', 'SystemFeatureController@destroy'); // delete system feature
    */

    /*** Report Format routes ***/
    Route::resource('report_format', 'ReportFormatController');
    /*
    Route::get('/report_format', 'ReportFormatController@index'); // show all report formats

    Route::post('/report_format', 'ReportFormatController@store'); // create new report format

    Route::put('/report_format/{id}', 'ReportFormatController@update'); // update report format

    Route::delete('/report_format/{id}', 'ReportFormatController@destroy'); // delete report format
    */
});
