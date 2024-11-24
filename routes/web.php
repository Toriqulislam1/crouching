<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parmentStaticController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\ExamController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FinancialStatementsController;
use App\Http\Controllers\SubjectController;


Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    return "All Clear";
});;



// frontend routes
Route::get('/', ['as' => '/', 'uses' => 'FrontendController@home']);

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {

    Route::get('edit-profile', ['as' => 'edit-profile', 'uses' => 'HomeController@editProfile']);
    Route::post('edit-profile', ['as' => 'update-profile', 'uses' => 'HomeController@updateProfile']);

    Route::get('password', ['as' => 'password', 'uses' => 'HomeController@changePassword']);
    Route::post('change-password', ['as' => 'change-password', 'uses' => 'HomeController@updatePassword']);
    //order
    Route::get('checkout/{id}', ['as' => 'checkout', 'uses' => 'HomeController@checkout']);
    Route::get('order', ['as' => 'order', 'uses' => 'HomeController@orderList']);
    Route::post('submit-order', ['as' => 'submit-order', 'uses' => 'HomeController@orderSubmit']);
});
// backend route
Auth::routes();
Route::get('admin', 'Auth\LoginController@showLoginForm');
Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard'])->middleware('auth');
Route::get('order-pdf/{orderId}', ['as' => 'order-pdf', 'uses' => 'HomeController@orderPdf'])->middleware('auth');

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('edit-profile', ['as' => 'edit-profile', 'uses' => 'HomeController@editProfile']);
    Route::post('edit-profile', ['as' => 'update-profile', 'uses' => 'HomeController@updateProfile']);

    Route::get('password', ['as' => 'password', 'uses' => 'HomeController@changePassword']);
    Route::post('change-password', ['as' => 'change-password', 'uses' => 'HomeController@updatePassword']);

    Route::get('get-about', ['as' => 'get-about', 'uses' => 'BasicController@about']);
    Route::post('get-about-update', ['as' => 'get-about-update', 'uses' => 'BasicController@aboutUpdate']);
    Route::get('get-privacy', ['as' => 'get-privacy', 'uses' => 'BasicController@privacy']);
    Route::post('get-privacy-update', ['as' => 'get-privacy-update', 'uses' => 'BasicController@privacyUpdate']);
    Route::get('get-terms', ['as' => 'get-terms', 'uses' => 'BasicController@terms']);
    Route::post('get-terms-update', ['as' => 'get-terms-update', 'uses' => 'BasicController@termsUpdate']);

    Route::get('get-basic', ['as' => 'get-basic', 'uses' => 'BasicController@index']);
    Route::get('get-basic', ['as' => 'get-basic', 'uses' => 'BasicController@index']);
    Route::post('get-basic-update', ['as' => 'get-basic-update', 'uses' => 'BasicController@update']);
    Route::get('get-copy-right', ['as' => 'get-copy-right', 'uses' => 'BasicController@indexCopy']);
    Route::post('get-copy-right-update', ['as' => 'get-copy-right-update', 'uses' => 'BasicController@updateCopy']);

    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('users', 'UserController');
    Route::resource('sliders', 'Controllers\SliderController');
    Route::resource('socials', 'Controllers\SocialController');
    Route::resource('faqs', 'Controllers\FaqController');

    Route::get('advertisement', ['as' => 'advertisement', 'uses' => 'controllers\FaqController@indexAdvertisement']);
    Route::get('advertisement-create', ['as' => 'advertisement-create', 'uses' => 'controllers\FaqController@createAdvertisement']);
    Route::post('advertisement-store', ['as' => 'advertisement-store', 'uses' => 'controllers\FaqController@storeAdvertisement']);
    Route::get('advertisement-edit/{id}', ['as' => 'advertisement-edit', 'uses' => 'controllers\FaqController@editAdvertisement']);
    Route::post('advertisement-update', ['as' => 'advertisement-update', 'uses' => 'controllers\FaqController@updateAdvertisement']);
    Route::delete('advertisement-delete', ['as' => 'advertisement-delete', 'uses' => 'controllers\FaqController@deleteAdvertisement']);

    Route::resource('package', 'PackageController');


    //payment backend
    Route::get('/bkash/index', [parmentStaticController::class, 'index'])->name('bkash-index');
    Route::get('/bkash/add', [parmentStaticController::class, 'createBkash'])->name('bkash-create');
    Route::post('/bkash/store', [parmentStaticController::class, 'bkashStore'])->name('bkash-store');
    Route::get('/bkash/edit{id}', [parmentStaticController::class, 'bkashEdit'])->name('bkash-edit');
    Route::post('/bkash/update', [parmentStaticController::class, 'bkashUpdate'])->name('bkash-update');
    Route::get('/bkash/delete{id}', [parmentStaticController::class, 'bkashDelete'])->name('bkash-delete');

    Route::get('/nagad/add', [parmentStaticController::class, 'nagadIndex'])->name('nagad-create');
    Route::post('/nagad/Update', [parmentStaticController::class, 'nagadUpdate'])->name('nagad-update');

    Route::get('/bank/add', [parmentStaticController::class, 'bankIndex'])->name('bank-create');
    Route::post('/bank/update', [parmentStaticController::class, 'bankUpdate'])->name('bank-update');
});
//payment for checkout page
Route::group(['middleware' => 'auth'], function () {

    Route::get('/user/payment/', [HomeController::class, 'userParyment'])->name('userPaymentIndex');

    Route::get('/user/payment/bkash/{orderId}', [HomeController::class, 'userParymentBkash'])->name('bkash-payment-form');
    Route::post('/user/payment/bkash/sucess', [HomeController::class, 'userParymentBkashSucess'])->name('bkash-payment-success');

    Route::get('/user/payment/nagad/{orderId}', [HomeController::class, 'userParymentNagad'])->name('nagad-payment-form');
    Route::post('/user/payment/nagad/sucess', [HomeController::class, 'userParymentNagadSucess'])->name('nagad-payment-success');

    Route::get('/user/payment/bank/{orderId}', [HomeController::class, 'userParymentBank'])->name('bank-payment-form');
    Route::post('/user/payment/bank/sucess', [HomeController::class, 'userParymentBankSucess'])->name('bank-payment-success');


    //admin order list
    Route::get('/admin/order/list', [HomeController::class, 'adminOrderList'])->name('admin-order-list');
    Route::get('/update-order-status/{orderId}', [HomeController::class, 'OrderStatusUpdate']);
    Route::get('/update-order-payment-status/{orderId}', [HomeController::class, 'OrderStatusPaymentUpdate']);
    Route::get('/admin/payment/order/list', [HomeController::class, 'adminPaymentOrderList'])->name('admin-payment-order-list');

    //Financial Statements

    Route::get('/admin/withdraw/index', [FinancialStatementsController::class, 'withdrawIndex'])->name('withdraw-index');
    Route::post('/admin/withdraw/store', [FinancialStatementsController::class, 'withdrawStore'])->name('withdraw-store');
    //expense
    Route::get('/admin/expen/cat/list', [FinancialStatementsController::class, 'expenseCategoryList'])->name('expense-category-list');
    Route::get('/admin/expen/cat/edit/{id}', [FinancialStatementsController::class, 'expenseCategoryEdit'])->name('categoryExpen.edit');
    Route::get('/admin/expense/category', [FinancialStatementsController::class, 'expenseCategory'])->name('expense-category');
    Route::post('/admin/expense/cat/store', [FinancialStatementsController::class, 'expenseCategoryStore'])->name('expense-cat-store');
    Route::get('/admin/expense/index', [FinancialStatementsController::class, 'expenseIndex'])->name('expense-index');
    Route::post('/admin/expense/Store', [FinancialStatementsController::class, 'expenseStore'])->name('expense-store');
    //manage course
    Route::prefix('admin')->name('admin.')->group(function () {
        //subject
        Route::prefix('subject')->name('subject.')->group(function () {
            Route::get('/index', [SubjectController::class, 'Index'])->name('index');
            Route::get('/create', [SubjectController::class, 'create'])->name('create');
            Route::post('/store', [SubjectController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('edit');
            Route::delete('/destroy/{id}', [SubjectController::class, 'destroy'])->name('destroy');
            Route::post('/update', [SubjectController::class, 'destroy'])->name('update');     Route::delete('/update', [SubjectController::class, 'destroy'])->name('update');
        });
            //batch
            Route::prefix('batch')->name('batch.')->group(function () {
            Route::get('/index', [BatchController::class, 'Index'])->name('index');
            Route::get('/create', [BatchController::class, 'create'])->name('create');
            Route::post('/store', [BatchController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BatchController::class, 'edit'])->name('edit');
            Route::delete('/destroy/{id}', [BatchController::class, 'destroy'])->name('destroy');
            Route::post('/update', [BatchController::class, 'destroy'])->name('update');     Route::delete('/update', [SubjectController::class, 'destroy'])->name('update');
        });
            //exam
            Route::prefix('exam')->name('exam.')->group(function () {
            Route::get('/index', [ExamController::class, 'Index'])->name('index');
            Route::get('/create', [ExamController::class, 'create'])->name('create');
            Route::post('/store', [ExamController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ExamController::class, 'edit'])->name('edit');
            Route::delete('/destroy/{id}', [ExamController::class, 'destroy'])->name('destroy');
            Route::post('/update', [ExamController::class, 'destroy'])->name('update');     Route::delete('/update', [SubjectController::class, 'destroy'])->name('update');
        });

    });
});
