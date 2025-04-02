<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Enums\RoleEnum;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/', function () { 
    return redirect('login');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:'.RoleEnum::ADMIN->value])->group(function () {
        Route::get('/edit_article/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('/update_article/{id}', [ArticleController::class, 'update'])->name('articles.update');
        Route::delete('/delete_article/{id}', [ArticleController::class, 'delete'])->name('articles.destroy');
        Route::get('/create_article', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('/store_article', [ArticleController::class,'store'])->name('articles.store');
    });
    Route::get('/article_view/{id}', [ArticleController::class,'article_view'])->name('articles.view');
    Route::get('/article_list', [ArticleController::class,'index'])->name('articles.index');
    Route::get('/draft_list', [ArticleController::class,'draft'])->name('drafts.index');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
