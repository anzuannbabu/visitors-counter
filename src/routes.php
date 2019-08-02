<?php

Route::get('visitorsCounter',function(){
	echo "welcome to visitors counter package!";
});

Route::get('record-visits','Anzuann\VisitorsCounter\Controllers\VisitorsCounterController@createCounter');

Route::post('api/visitorsLog','Anzuann\VisitorsCounter\Controllers\VisitorsCounterController@log');
Route::get('api/visitorsLog','Anzuann\VisitorsCounter\Controllers\VisitorsCounterController@viewLogs');
