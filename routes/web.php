<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Website Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Home Page
route::get('/','App\Http\Controllers\Frontend\PagesController@home')->name('home');
//About Page
route::get('/about','App\Http\Controllers\Frontend\PagesController@about')->name('about');
//Faq Page
route::get('/faq','App\Http\Controllers\Frontend\PagesController@faq')->name('faq');
//Recordd Page
route::get('/record','App\Http\Controllers\Frontend\PagesController@record')->name('record');
// Contact Info
route::get('/contact','App\Http\Controllers\Frontend\PagesController@contact')->name('contact');
Route::post('contact-us', 'App\Http\Controllers\Frontend\PagesController@saveContact')->name('contact-us');
//User Auth
Route::prefix('user')->group(function () {
    Route::get('login','App\Http\Controllers\Auth\LoginController@form')->name('login.form');
    Route::post('login','App\Http\Controllers\Auth\LoginController@submit')->name('login.submit');

    Route::get('register','App\Http\Controllers\Auth\RegisterController@form')->name('register.form');
    Route::post('register','App\Http\Controllers\Auth\RegisterController@submit')->name('register.submit');

    //Password Reset
    Route::get('password/reset','App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
    Route::post('password/email','App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
    Route::get('password/reset/{token}','App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('user.password.reset');
    Route::post('password/reset','App\Http\Controllers\Auth\ResetPasswordController@reset')->name('user.password.update');
});
// User Home
Route::group(['prefix'=>'user','middleware' => 'auth:customer'],function(){
    Route::get('/home', 'App\Http\Controllers\Backend\UserProfileController@index')->name('account');
    Route::post('/profile/{id}', 'App\Http\Controllers\Backend\UserProfileController@profile')->name('account.profile');
    Route::post('/active/{id}', 'App\Http\Controllers\Backend\UserProfileController@active')->name('active.account');
    Route::post('/payment', 'App\Http\Controllers\Backend\UserProfileController@payment_request')->name('payment.request');
    Route::post('/update-password', 'App\Http\Controllers\Backend\UserProfileController@password')->name('account.password');
    Route::get('/cancel/{id}','App\Http\Controllers\Backend\OrderController@update')->name('order.delete');

    //Faq Page
    route::get('/video','App\Http\Controllers\Frontend\PagesController@video')->name('video');
    route::get('/video/{id}','App\Http\Controllers\Frontend\PagesController@show')->name('video.show');
    route::get('/submit','App\Http\Controllers\Frontend\PagesController@submit')->name('video.submit');
});

/*
|--------------------------------------------------------------------------
| Website Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);

Route::group(['prefix'=>'admin','middleware' => 'auth'],function(){
    // Dashboard
    route::get('dashboard','App\Http\Controllers\Backend\AdminController@index')->name('dashboard');

    route::group(['prefix'=>'pageinfo'],function(){
        route::get('/manage','App\Http\Controllers\Backend\PageheaderController@index')->name('header.manage');
        route::get('/edit/{id}','App\Http\Controllers\Backend\PageheaderController@edit')->name('header.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\PageheaderController@update')->name('header.update');
    });
    route::group(['prefix'=>'heading'],function(){
        route::get('/manage','App\Http\Controllers\Backend\HeadertitleController@index')->name('heading.manage');
        route::get('/edit/{id}','App\Http\Controllers\Backend\HeadertitleController@edit')->name('heading.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\HeadertitleController@update')->name('heading.update');
    });

    route::group(['prefix'=>'contact'],function(){
        route::get('/manage','App\Http\Controllers\Backend\ContactController@index')->name('contact.manage');
        route::get('/edit/{id}','App\Http\Controllers\Backend\ContactController@edit')->name('contact.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\ContactController@update')->name('contact.update');
    });

    route::group(['prefix'=>'footer'],function(){
        route::get('/manage','App\Http\Controllers\Backend\FooterController@index')->name('footer.manage');
        route::get('/edit/{id}','App\Http\Controllers\Backend\FooterController@edit')->name('footer.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\FooterController@update')->name('footer.update');
    });

    Route::prefix('mail')->group(function () {
        Route::get('/manage','App\Http\Controllers\Backend\ContactController@mail')->name('mail.manage');
    });

    route::group(['prefix'=>'about'],function(){
        route::get('/manage','App\Http\Controllers\Backend\AboutController@index')->name('about.manage');
        route::get('/edit/{id}','App\Http\Controllers\Backend\AboutController@edit')->name('about.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\AboutController@update')->name('about.update');
    });

    Route::prefix('faq')->group(function () {
        Route::get('/manage','App\Http\Controllers\Backend\FaqController@index')->name('faq.manage');
        Route::get('/create','App\Http\Controllers\Backend\FaqController@create')->name('faq.create');
        Route::post('/store','App\Http\Controllers\Backend\FaqController@store')->name('faq.store');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\FaqController@edit')->name('faq.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\FaqController@update')->name('faq.update');
        Route::post('/delete/{id}','App\Http\Controllers\Backend\FaqController@destroy')->name('faq.delete');
    });

    Route::prefix('Video')->group(function () {
        Route::get('/manage','App\Http\Controllers\Backend\VideoController@index')->name('video.manage');
        Route::get('/create','App\Http\Controllers\Backend\VideoController@create')->name('video.create');
        Route::post('/store','App\Http\Controllers\Backend\VideoController@store')->name('video.store');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\VideoController@edit')->name('video.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\VideoController@update')->name('video.update');
        Route::post('/delete/{id}','App\Http\Controllers\Backend\VideoController@destroy')->name('video.delete');
    });

    Route::prefix('menu')->group(function () {
        Route::get('/manage','App\Http\Controllers\Backend\MenuController@index')->name('menu.manage');
        Route::get('/create','App\Http\Controllers\Backend\MenuController@create')->name('menu.create');
        Route::post('/store','App\Http\Controllers\Backend\MenuController@store')->name('menu.store');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\MenuController@edit')->name('menu.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\MenuController@update')->name('menu.update');
        Route::post('/delete/{id}','App\Http\Controllers\Backend\MenuController@destroy')->name('menu.delete');
    });

    Route::prefix('payment')->group(function () {
        Route::get('/manage','App\Http\Controllers\Backend\PaymentController@index')->name('payment.manage');
        Route::get('/pending','App\Http\Controllers\Backend\PaymentController@pending')->name('payment.pending');
        Route::get('/cancel','App\Http\Controllers\Backend\PaymentController@cancel')->name('payment.cancel');
        Route::post('/approve/{id}','App\Http\Controllers\Backend\PaymentController@approve')->name('payment.approve');
        Route::post('/update/{id}','App\Http\Controllers\Backend\PaymentController@update')->name('payment.update');
        Route::get('/delete/{id}','App\Http\Controllers\Backend\PaymentController@destroy')->name('payment.delete');
    });
    Route::prefix('customer')->group(function () {
        Route::get('/manage','App\Http\Controllers\Backend\UserController@user_index')->name('user.manage');
        Route::get('/pending','App\Http\Controllers\Backend\UserController@pending')->name('user.pending');
        Route::get('/due','App\Http\Controllers\Backend\UserController@due')->name('user.due');
        Route::get('/approve/{id}','App\Http\Controllers\Backend\UserController@approve')->name('user.approve');
        Route::get('/create','App\Http\Controllers\Backend\UserController@user_create')->name('user.create');
        Route::post('/store','App\Http\Controllers\Backend\UserController@user_store')->name('user.store');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\UserController@user_edit')->name('user.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\UserController@user_update')->name('user.update');
        Route::get('/delete/{id}','App\Http\Controllers\Backend\UserController@user_destroy')->name('user.delete');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/manage','App\Http\Controllers\Backend\UserController@admin_index')->name('admin.manage');
        Route::get('/create','App\Http\Controllers\Backend\UserController@admin_create')->name('admin.create');
        Route::post('/store','App\Http\Controllers\Backend\UserController@admin_store')->name('admin.store');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\UserController@admin_edit')->name('admin.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\UserController@admin_update')->name('admin.update');
        Route::get('/delete/{id}','App\Http\Controllers\Backend\UserController@admin_destroy')->name('admin.delete');
    });
    Route::group(['prefix' => 'WebsiteSettings'], function(){
        Route::get('/info','App\Http\Controllers\Backend\WebSettingsController@info_show')->name('info.show');
        Route::get('/optimization','App\Http\Controllers\Backend\WebSettingsController@optimize_show')->name('optimize.show');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\WebSettingsController@edit')->name('edit');
        Route::post('/edit/{id}','App\Http\Controllers\Backend\WebSettingsController@update_info')->name('edit.update');
        Route::get('/update/mail','App\Http\Controllers\Backend\WebSettingsController@mail_show')->name('mail.settings');
        Route::post('/update/mail','App\Http\Controllers\Backend\WebSettingsController@update_mail')->name('mail.settings.update');
	});

    Route::get('/cache', function() {
        $exitCode = Artisan::call('cache:clear');
        return redirect()->route('optimize.show');
    })->name('cache');
    Route::get('/optimize', function() {
        $exitCode = Artisan::call('optimize');
        return redirect()->route('optimize.show');
    })->name('optimize');
    Route::get('/config', function() {
        $exitCode = Artisan::call('config:cache');
        return redirect()->route('optimize.show');
    })->name('config');
    Route::get('/event', function() {
        $exitCode = Artisan::call('event:cache');
        return redirect()->route('optimize.show');
    })->name('event');
    Route::get('/route', function() {
        $exitCode = Artisan::call('route:clear');
        return redirect()->route('optimize.show');
    })->name('route');
    Route::get('/view', function() {
        $exitCode = Artisan::call('view:clear');
        return redirect()->route('optimize.show');
    })->name('view');
    Route::get('/totaloptimize', function() {
        Artisan::call('cache:clear');
        Artisan::call('optimize');
        Artisan::call('config:cache');
        Artisan::call('event:cache');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return "Cleared!";
    });
});
