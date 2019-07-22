<?php 
    Route::get('/Category', "Catalog\Category\Controllers\CategoryController@ListCategory")->name('Category');
    Route::get('/Category/add', "Catalog\Category\Controllers\CategoryController@GetAddCategory")->name('AddCategory');
    Route::post('/Category/add', "Catalog\Category\Controllers\CategoryController@PostAddCategory");
    Route::get('/Category/edit/{id}', "Catalog\Category\Controllers\CategoryController@GetEditCategory")->name('EditCategory');
    Route::post('/Category/edit/{id}', "Catalog\Category\Controllers\CategoryController@PostEditCategory")->name('EditCategory');
    Route::get('/Category/delete/{id}', "Catalog\Category\Controllers\CategoryController@DeleteCategory")->name('DeleteCategory');
?>