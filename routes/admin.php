<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguesController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\TypeContenuController;
use App\Http\Controllers\TypeMediaController;
use App\Http\Controllers\EditeurController;
use App\Http\Controllers\ContentEditeurController;


Route::prefix('admin')->group(function() {
    Route::resource('langues', LanguesController::class);
    Route::resource('utilisateurs', UtilisateurController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('commentaires', CommentaireController::class);
    Route::resource('contenus', ContenuController::class);
    Route::resource('medias', MediaController::class);
    Route::resource('typecontenus', TypeContenuController::class);
    Route::resource('typemedias', TypeMediaController::class);
    Route::get('/admin/register', [UtilisateurController::class, 'create'])->name('admin.register');
    Route::post('/admin/register', [UtilisateurController::class, 'store']);

});

Route::get('/editeur/dashboard', [EditeurController::class, 'index'])->name('editeur.dashboard');
Route::prefix('editeur')->name('editeur.')->group(function () {
    Route::resource('contenus', ContentEditeurController::class);
});
