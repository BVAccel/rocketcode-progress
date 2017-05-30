<?php

Route::get(
	config('async-status.base_path' ) . "/status/{id}",
	'Rocketcode\Progress\Controllers\ProgressController@status'
);