<?php 
    Route::get('/regulations', "Catalog\Regulations\Controllers\RegulationsController@ListRegulations")->name('Regulations');
    Route::get('/regulations/add', "Catalog\Regulations\Controllers\RegulationsController@GetAddRegulations")->name('AddRegulations');
    Route::post('/regulations/add', "Catalog\Regulations\Controllers\RegulationsController@PostAddRegulations");
    Route::get('/regulations/edit/{id}', "Catalog\Regulations\Controllers\RegulationsController@GetEditRegulations")->name('EditRegulations');
    Route::post('/regulations/edit/{id}', "Catalog\Regulations\Controllers\RegulationsController@PostEditRegulations")->name('EditRegulations');
    Route::get('/regulations/delete/{id}', "Catalog\Regulations\Controllers\RegulationsController@DeleteRegulations")->name('DeleteRegulations');
?>