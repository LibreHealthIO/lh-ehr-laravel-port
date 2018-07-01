<?php

Route::group(['middleware' => 'web', 'prefix' => 'reportgenerator', 'namespace' => 'Modules\ReportGenerator\Http\Controllers'], function()
{
    Route::get('/', 'ReportGeneratorController@index');

    Route::get('/generate', 'ReportGeneratorController@getComponents');

    Route::get('/report/{option_ids}', 'ReportGeneratorController@showReport');

    Route::get('/system_feature', 'ReportGeneratorController@showSystemFeatures'); // show all system features

    Route::post('/system_feature', 'ReportGeneratorController@createSystemFeature'); // create new system feature
});
