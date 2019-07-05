<?php 
    Route::get('/attr-group', "Catalog\AttributeGroup\Controllers\AttributeGroupController@ListAttributeGroup")->name('AttributeGroup');
    Route::get('/attr-group/add', "Catalog\AttributeGroup\Controllers\AttributeGroupController@GetAddAttributeGroup")->name('AddAttributeGroup');
    Route::post('/attr-group/add', "Catalog\AttributeGroup\Controllers\AttributeGroupController@PostAddAttributeGroup");
    Route::get('/attr-group/edit/{id}', "Catalog\AttributeGroup\Controllers\AttributeGroupController@GetEditAttributeGroup")->name('EditAttributeGroup');
    Route::post('/attr-group/edit/{id}', "Catalog\AttributeGroup\Controllers\AttributeGroupController@PostEditAttributeGroup");
    Route::get('/attr-group/delete/{id}', "Catalog\AttributeGroup\Controllers\AttributeGroupController@DeleteAttributeGroup")->name('DeleteAttributeGroup');
?>