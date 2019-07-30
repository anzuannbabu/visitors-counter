<?php

Route::get('visitorsCounter',function(){
	echo "welcome to visitors counter package!";
});

Route::get('record-visits','Advintech\VisitorsCounter\Controllers\VisitorsCounterController@createCounter');

Route::post('api/visitorsLog','Advintech\VisitorsCounter\Controllers\VisitorsCounterController@log');
