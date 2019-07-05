<?php 
    Route::get('/products', "Catalog\Products\Controllers\ProductsController@ListProducts")->name('Products');
    Route::get('/products/add', "Catalog\Products\Controllers\ProductsController@GetAddProduct")->name('AddProduct');
    Route::post('/products/add', "Catalog\Products\Controllers\ProductsController@PostAddProduct");
    Route::get('/products/edit/{id}', "Catalog\Products\Controllers\ProductsController@GetEditProduct")->name('EditProduct');
    Route::post('/products/edit/{id}', "Catalog\Products\Controllers\ProductsController@PostEditProduct");
    Route::get('/products/delete/{id}', "Catalog\Products\Controllers\ProductsController@DeleteProduct")->name('DeleteProduct');

?>