<?php 
    Route::get('/attr', "Catalog\Attribute\Controllers\AttributeController@ListAttribute")->name('Attribute');
    Route::get('/attr/add', "Catalog\Attribute\Controllers\AttributeController@GetAddAttribute")->name('AddAttribute');
    Route::post('/attr/add', "Catalog\Attribute\Controllers\AttributeController@PostAddAttribute");
    Route::get('/attr/edit/{id}', "Catalog\Attribute\Controllers\AttributeController@GetEditAttribute")->name('EditAttribute');
    Route::post('/attr/edit/{id}', "Catalog\Attribute\Controllers\AttributeController@PostEditAttribute");
    Route::get('/attr/delete/{id}', "Catalog\Attribute\Controllers\AttributeController@DeleteAttribute")->name('DeleteAttribute');
?>