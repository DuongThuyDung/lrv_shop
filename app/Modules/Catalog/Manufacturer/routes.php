<?php 
    Route::get('/manufacturer', "Catalog\Manufacturer\Controllers\ManufacturerController@ListManufacturer")->name('Manufacturer');
    Route::get('/manufacturer/add', "Catalog\Manufacturer\Controllers\ManufacturerController@GetAddManufacturer")->name('AddManufacturer');
    Route::post('/manufacturer/add', "Catalog\Manufacturer\Controllers\ManufacturerController@PostAddManufacturer");
    Route::get('/manufacturer/edit/{id}', "Catalog\Manufacturer\Controllers\ManufacturerController@GetEditManufacturer")->name('EditManufacturer');
    Route::post('/manufacturer/edit/{id}', "Catalog\Manufacturer\Controllers\ManufacturerController@PostEditManufacturer");
    Route::get('/manufacturer/delete/{id}', "Catalog\Manufacturer\Controllers\ManufacturerController@DeleteManufacturer")->name('DeleteManufacturer');
?>