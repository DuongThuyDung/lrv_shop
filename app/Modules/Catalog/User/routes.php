<?php 
    Route::get('/user', "Catalog\User\Controllers\UserController@ListUser")->name('User');
    Route::get('/user/add', "Catalog\User\Controllers\UserController@GetAddUser")->name('AddUser');
    Route::post('/user/add', "Catalog\User\Controllers\UserController@PostAddUser");
    Route::get('/user/edit/{id}', "Catalog\User\Controllers\UserController@GetEditUser")->name('EditUser');
    Route::post('/user/edit/{id}', "Catalog\User\Controllers\UserController@PostEditUser");
    Route::get('/user/delete/{id}', "Catalog\User\Controllers\UserController@DeleteUser")->name('DeleteUser');
?>
