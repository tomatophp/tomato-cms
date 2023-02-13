<?php


use Illuminate\Support\Facades\Route;

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/contents', [\TomatoPHP\TomatoCms\Http\Controllers\ContentController::class, 'index'])->name('contents.index');
    Route::get('admin/contents/api', [\TomatoPHP\TomatoCms\Http\Controllers\ContentController::class, 'api'])->name('contents.api');
    Route::get('admin/contents/create', [\TomatoPHP\TomatoCms\Http\Controllers\ContentController::class, 'create'])->name('contents.create');
    Route::post('admin/contents', [\TomatoPHP\TomatoCms\Http\Controllers\ContentController::class, 'store'])->name('contents.store');
    Route::get('admin/contents/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\ContentController::class, 'show'])->name('contents.show');
    Route::get('admin/contents/{model}/edit', [\TomatoPHP\TomatoCms\Http\Controllers\ContentController::class, 'edit'])->name('contents.edit');
    Route::post('admin/contents/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\ContentController::class, 'update'])->name('contents.update');
    Route::delete('admin/contents/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\ContentController::class, 'destroy'])->name('contents.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/blocks', [\TomatoPHP\TomatoCms\Http\Controllers\BlockController::class, 'index'])->name('blocks.index');
    Route::get('admin/blocks/api', [\TomatoPHP\TomatoCms\Http\Controllers\BlockController::class, 'api'])->name('blocks.api');
    Route::get('admin/blocks/create', [\TomatoPHP\TomatoCms\Http\Controllers\BlockController::class, 'create'])->name('blocks.create');
    Route::post('admin/blocks', [\TomatoPHP\TomatoCms\Http\Controllers\BlockController::class, 'store'])->name('blocks.store');
    Route::get('admin/blocks/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\BlockController::class, 'show'])->name('blocks.show');
    Route::get('admin/blocks/{model}/edit', [\TomatoPHP\TomatoCms\Http\Controllers\BlockController::class, 'edit'])->name('blocks.edit');
    Route::post('admin/blocks/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\BlockController::class, 'update'])->name('blocks.update');
    Route::delete('admin/blocks/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\BlockController::class, 'destroy'])->name('blocks.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/seos', [\TomatoPHP\TomatoCms\Http\Controllers\SeoController::class, 'index'])->name('seos.index');
    Route::get('admin/seos/api', [\TomatoPHP\TomatoCms\Http\Controllers\SeoController::class, 'api'])->name('seos.api');
    Route::get('admin/seos/create', [\TomatoPHP\TomatoCms\Http\Controllers\SeoController::class, 'create'])->name('seos.create');
    Route::post('admin/seos', [\TomatoPHP\TomatoCms\Http\Controllers\SeoController::class, 'store'])->name('seos.store');
    Route::get('admin/seos/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\SeoController::class, 'show'])->name('seos.show');
    Route::get('admin/seos/{model}/edit', [\TomatoPHP\TomatoCms\Http\Controllers\SeoController::class, 'edit'])->name('seos.edit');
    Route::post('admin/seos/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\SeoController::class, 'update'])->name('seos.update');
    Route::delete('admin/seos/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\SeoController::class, 'destroy'])->name('seos.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/contents-metas', [\TomatoPHP\TomatoCms\Http\Controllers\ContentsMetaController::class, 'index'])->name('contents-metas.index');
    Route::get('admin/contents-metas/api', [\TomatoPHP\TomatoCms\Http\Controllers\ContentsMetaController::class, 'api'])->name('contents-metas.api');
    Route::get('admin/contents-metas/create', [\TomatoPHP\TomatoCms\Http\Controllers\ContentsMetaController::class, 'create'])->name('contents-metas.create');
    Route::post('admin/contents-metas', [\TomatoPHP\TomatoCms\Http\Controllers\ContentsMetaController::class, 'store'])->name('contents-metas.store');
    Route::get('admin/contents-metas/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\ContentsMetaController::class, 'show'])->name('contents-metas.show');
    Route::get('admin/contents-metas/{model}/edit', [\TomatoPHP\TomatoCms\Http\Controllers\ContentsMetaController::class, 'edit'])->name('contents-metas.edit');
    Route::post('admin/contents-metas/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\ContentsMetaController::class, 'update'])->name('contents-metas.update');
    Route::delete('admin/contents-metas/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\ContentsMetaController::class, 'destroy'])->name('contents-metas.destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/comments', [\TomatoPHP\TomatoCms\Http\Controllers\CommentController::class, 'index'])->name('comments.index');
    Route::get('admin/comments/api', [\TomatoPHP\TomatoCms\Http\Controllers\CommentController::class, 'api'])->name('comments.api');
    Route::get('admin/comments/create', [\TomatoPHP\TomatoCms\Http\Controllers\CommentController::class, 'create'])->name('comments.create');
    Route::post('admin/comments', [\TomatoPHP\TomatoCms\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
    Route::get('admin/comments/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\CommentController::class, 'show'])->name('comments.show');
    Route::get('admin/comments/{model}/edit', [\TomatoPHP\TomatoCms\Http\Controllers\CommentController::class, 'edit'])->name('comments.edit');
    Route::post('admin/comments/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\CommentController::class, 'update'])->name('comments.update');
    Route::delete('admin/comments/{model}', [\TomatoPHP\TomatoCms\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');
});
