<?php 
    Route::get('/', "Common\Dashboard\Controllers\CommonController@Dashboard")->name('Dashboard');
    Route::get('/logout', "Common\Dashboard\Controllers\CommonController@GetLogout")->name('admin-logout');
?>