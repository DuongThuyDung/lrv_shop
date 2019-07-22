<?php 
    Route::get('/new', "Catalog\News\Controllers\NewsController@ListNews")->name('News');
    Route::get('/new/add', "Catalog\News\Controllers\NewsController@GetAddNews")->name('AddNews');
    Route::post('/new/add', "Catalog\News\Controllers\NewsController@PostAddNews");
    Route::get('/new/edit/{id}', "Catalog\News\Controllers\NewsController@GetEditNews")->name('EditNews');
    Route::post('/new/edit/{id}', "Catalog\News\Controllers\NewsController@PostEditNews")->name('EditNews');
    Route::get('/new/delete/{id}', "Catalog\News\Controllers\NewsController@DeleteNews")->name('DeleteNews');
?>