<?php 
    Route::get('/category', "Catalog\Category\Controllers\CategoryController@ListCategory")->name('Category');
    Route::get('/category/add', "Catalog\Category\Controllers\CategoryController@GetAddCategory")->name('AddCategory');
    Route::post('/category/add', "Catalog\Category\Controllers\CategoryController@PostAddCategory");
    Route::get('/category/edit/{id}', "Catalog\Category\Controllers\CategoryController@GetEditCategory");
    Route::post('/category/edit/{id}', "Catalog\Category\Controllers\CategoryController@PostEditCategory");
    Route::get('/category/delete/{id}', "Catalog\Category\Controllers\CategoryController@DeleteCategory");
?>