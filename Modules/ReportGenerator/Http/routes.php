<?php

Route::group(['middleware' => 'web', 'prefix' => 'reportgenerator', 'namespace' => 'Modules\ReportGenerator\Http\Controllers'], function()
{
    Route::get('/', 'ReportGeneratorController@index');

    Route::get('/generate', 'ReportGeneratorController@getComponents');

    Route::get('/report/{option_ids}', 'ReportGeneratorController@showReport');
});
