<?php

Route::middleware(['auth:sanctum'])->prefix('api/pages')->name('api.pages.')->group(function () {
    Route::get('/', [\TomatoPHP\TomatoCms\Http\Controllers\PageController::class, 'index'])->name('index');
    Route::get('/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\PageController::class, 'show'])->name('show');
});
