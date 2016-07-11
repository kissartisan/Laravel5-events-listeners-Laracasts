<?php

use App\Events\UserHasRegistered;

Route::get('/', functßion () {
    return view('welcome');
});

Route::get('broadcast', function() {
	$name = Request::input('name');
	
	event(new UserHasRegistered($name));

	return 'Done';
});
