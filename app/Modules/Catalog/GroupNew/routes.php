<?php 
    Route::get('/group-new', "Catalog\GroupNew\Controllers\GroupNewController@ListGroupNew")->name('GroupNew');
    Route::get('/group-new/add', "Catalog\GroupNew\Controllers\GroupNewController@GetAddGroupNew")->name('AddGroupNew');
    Route::post('/group-new/add', "Catalog\GroupNew\Controllers\GroupNewController@PostAddGroupNew");
    Route::get('/group-new/edit/{id}', "Catalog\GroupNew\Controllers\GroupNewController@GetEditGroupNew")->name('EditGroupNew');
    Route::post('/group-new/edit/{id}', "Catalog\GroupNew\Controllers\GroupNewController@PostEditGroupNew")->name('EditGroupNew');
    Route::get('/group-new/delete/{id}', "Catalog\GroupNew\Controllers\GroupNewController@DeleteGroupNew")->name('DeleteGroupNew');
?>