<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\backend\DashboardController;

Route::get('/', function () {
    return view('welcome');
});



//14-10-2025: Login, Logout


Route::get('login1', [AuthController::class, 'login1'])->name('login1');
Route::post('login1', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


//-----------------------------------------------------------------------------//



Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', fn() => view('admin.pages.dashboard'))->name('dashboard');

    // COMPONENTS
    Route::prefix('components')->name('components.')->group(function () {
        Route::get('alert', fn() => view('admin.components.component-alert'))->name('alert');
        Route::get('badge', fn() => view('admin.components.component-badge'))->name('badge');
        Route::get('breadcrumb', fn() => view('admin.components.component-breadcrumb'))->name('breadcrumb');
        Route::get('buttons', fn() => view('admin.components.component-buttons'))->name('buttons');
        Route::get('card', fn() => view('admin.components.component-card'))->name('card');
        Route::get('carousel', fn() => view('admin.components.component-carousel'))->name('carousel');
        Route::get('dropdowns', fn() => view('admin.components.component-dropdowns'))->name('dropdowns');
        Route::get('list-group', fn() => view('admin.components.component-list-group'))->name('list-group');
        Route::get('modal', fn() => view('admin.components.component-modal'))->name('modal');
        Route::get('navs', fn() => view('admin.components.component-navs'))->name('navs');
        Route::get('pagination', fn() => view('admin.components.component-pagination'))->name('pagination');
        Route::get('progress', fn() => view('admin.components.component-progress'))->name('progress');
        Route::get('spinners', fn() => view('admin.components.component-spinners'))->name('spinners');
        Route::get('tooltips', fn() => view('admin.components.component-tooltips'))->name('tooltips');
    });

    // EXTRA COMPONENTS
    Route::prefix('extra-components')->name('extra.')->group(function () {
        Route::get('avatar', fn() => view('admin.pages.extra.avatar'))->name('avatar');
        Route::get('divider', fn() => view('admin.pages.extra.divider'))->name('divider');
    });

    // FORM ELEMENTS
    Route::prefix('forms')->name('forms.')->group(function () {
        Route::get('input', fn() => view('admin.pages.forms.input'))->name('input');
        Route::get('input-group', fn() => view('admin.pages.forms.input_group'))->name('input_group');
        Route::get('select', fn() => view('admin.pages.forms.select'))->name('select');
        Route::get('radio', fn() => view('admin.pages.forms.radio'))->name('radio');
        Route::get('checkbox', fn() => view('admin.pages.forms.checkbox'))->name('checkbox');
        Route::get('textarea', fn() => view('admin.pages.forms.textarea'))->name('textarea');
    });

    // FORM LAYOUT + EDITOR
    Route::get('/form-layout', fn() => view('admin.pages.form_layout'))->name('form_layout');
    Route::get('/form-editor', fn() => view('admin.pages.form_editor'))->name('form_editor');

    // TABLES
    Route::get('/table', fn() => view('admin.pages.table'))->name('table');
    Route::get('/datatable', fn() => view('admin.pages.datatable'))->name('datatable');


});