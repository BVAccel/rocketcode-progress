<?php
Route::get(
	config('async-status.base_url', '/async' ) . "/status/{id}",
	'Rocketcode\AsyncStatus\Controllers\AsyncStatusController@status'
);