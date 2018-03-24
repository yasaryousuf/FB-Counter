<?php
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


*/

########################
#   General routes
########################

Route::get('/', 'HomeController@index');
Route::get('facebook/test', 'HomeController@fbtest');
// Route::get('/', 'HomeController@index');
// Route::redirect('/', '/my-account');
Route::get('support', 'HomeController@support');
Route::get('terms-and-conditions', 'HomeController@TermsConditions');
Route::get('order-form', 'PlansController@show')->middleware('auth');
Route::get('fb-callback', 'FacebookController@create');
//
Route::post('password/forget', 'PasswordController@forget');
Route::get('password/reset/{token}', 'PasswordController@showResetForm');
Route::post('password/reset', 'PasswordController@reset');

//
Route::post('mailchimp-subscribe', 'MailChimpController@subscribe');
// Route::post('validateUsername', 'Authentication\RegisterController@username');
Route::post('validateEmail', 'Authentication\RegisterController@email');
Route::post('registration', 'Authentication\RegisterController@registration');
Route::post('signin', 'Authentication\LoginController@login');
Route::get('tutorial/{slug}', 'PostController@show');

//    Contact Routes
Route::get('contact', 'ContactController@show');
Route::post('contact', 'ContactController@store');
Route::get('feedback', 'ContactController@feedback');

// brain tree routes
Route::get('/plans', 'PlansController@index');
Route::post('subscribe', 'SubscriptionsController@store');
Route::get('/braintree/token', 'BraintreeTokenController@token');
// Route::get('/plan/{plan}', 'PlansController@show');

Auth::routes();

Route::post(
    'braintree/webhook',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);

Route::get('error', function () {
    return view('errors.403');
});

Route::get('mail', function () {
    Mailgun::send('emails.welcome', [], function ($message) {
        $message->to('yousuf@opcodespace.com', 'John Smith')->subject('Welcome!');
    });
});

Route::get('counter/{slug}', 'HomeController@counter')->middleware('member');
########################
#   User routes
########################

Route::group([ 'prefix' => 'my-account', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdpageController@dashboard');
    Route::post('counter/refresh', 'HomeController@counterRefresh')->middleware('member');
    Route::get('settings/{lang?}', 'AdpageController@index')->name('settings')->middleware('member');

    //Ad Page Routes
    Route::post('ad-page', 'AdpageController@store');
    Route::get('ad-page/edit/{id}', 'AdpageController@edit');
    Route::get('ad-page/delete/{id}', 'AdpageController@destroy');
    Route::post('ad-page/getPageInfo', 'AdpageController@getPageInfo');

    //Company Routes
    Route::get('company-info', 'CompanyController@edit');
    Route::post('company-info', 'CompanyController@update');

    //Profile Routes
    Route::get('profile/{lang?}', 'UserController@edit');
    Route::post('profile', 'UserController@update');

    Route::get('billing-info/{lang?}', 'BillingController@show');
    Route::post('billing-info', 'BillingController@update');

    //subscription Routes
    Route::get('subscription/', 'SubscriptionsController@index');
    Route::get('subscription/cancel', 'SubscriptionsController@cancel');
    Route::get('subscription/update', 'SubscriptionsController@update');
    Route::get('subscription/resume', 'SubscriptionsController@resume');
    Route::get('subscription/test', 'SubscriptionsController@test');
    Route::get('subscription/change/{id}', 'SubscriptionsController@change');

    Route::get('subscription/invoice', 'SubscriptionsController@invoice');
});

########################
#   admin routes
########################

Route::group([ 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('tutorial', 'PostController@index');
    Route::post('tutorial', 'PostController@store');
    Route::get('tutorial/create', 'PostController@create');
    Route::get('tutorial/edit/{id}', 'PostController@edit');
    Route::post('tutorial/update', 'PostController@update');
    Route::get('tutorial/delete/{id}', 'PostController@destroy');

    Route::get('users', 'UserController@index');
    Route::get('log-in-as-user/{id}', 'UserController@viewAsUser');
});
